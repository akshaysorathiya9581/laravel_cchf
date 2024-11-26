<?php

namespace App\Http\Controllers;

use App\Mail\DonorNotification;
use App\Mail\ManagerNotification;
use App\Services\Payment\PaymentProcessor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Log;


class PaymentController extends Controller
{

    protected $paymentProcessor;
    protected $donationController;
    public function __construct(PaymentProcessor $paymentProcessor, DonationController  $donationController)
    {
        $this->paymentProcessor = $paymentProcessor;
        $this->donationController = $donationController;
    }


    public function processPayment(Request $request, $campaignId)
    {


        $request->validate([
            'amount' => 'required|numeric|min:1',
            'pay_with' => 'required|string',
        ]);

        try {
            $paymentIntent = $this->paymentProcessor->createPaymentIntent($request, $campaignId);
            // dd($paymentIntent);
            $donation =  $this->donationController->handlePostPayment($request, $campaignId, $paymentIntent);
            // dd($donation);
            if ($donation) {
                if ($donation instanceof \Illuminate\Http\JsonResponse) {
                    $donation = $donation->getData();
                }

                if (isset($donation->donation)) {
                    $donationObject = $donation->donation;
                    if (!empty($donation->error)) {
                        return response()->json(['error' => (string) $donation->error], 400);
                    }
                    setSendgridApiKey();

                    try {
                        Mail::to($donationObject->donor_email)->send(new DonorNotification($donationObject));

                        $managers = DB::table('campaign_users')
                            ->join('users', 'campaign_users.user_id', '=', 'users.id')
                            ->where('campaign_users.campaign_id', $donationObject->campaign_id)
                            ->select('users.email')
                            ->get();
                            
                        foreach ($managers as $manager) {
                            Mail::to($manager->email)->send(new ManagerNotification($donationObject));
                        }

                        return response()->json(['success' => 'Payment successful', 'donation' => $donationObject->friendly_key], 200);
                    } catch (\Exception $e) {
                        Log::error('Email sending failed: ' . $e->getMessage());
                    }
                } else {
                    Log::error('Invalid donation structure: donation key not found.');
                }
            }
        } catch (\Exception $e) {
            return response()->json(['error' =>   $e->getMessage()], 400);
        }
    }
}