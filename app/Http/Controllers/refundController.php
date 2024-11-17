<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use App\Models\Donations;
use App\Models\PaymentMethod;
use App\Models\refundDonation;
use App\Services\Payment\CardknoxService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class refundController extends Controller
{

    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'donationId' => 'required|numeric',
            'type' => 'required|string',
            'refund_confirm' => 'required|numeric',
            'total_amount' => 'required|numeric',
            'payment_method' => 'required|string',
            'campaign_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $payment_env = config('app.payment_env');

        if ($request->payment_method == 'cardknox') {
            $request->payment_method = 'cardknox_cc';
        }

        $paymentMethodConfig = PaymentMethod::where('campaign_id',  $request->campaign_id)
            ->where('environment',  $payment_env)
            ->where('payment_method', $request->payment_method)
            ->first();


        $request->paymentMethodConfig = $paymentMethodConfig;






        // $request->total_amount = 5;

        $processRefund = $this->processRefund($request);


        // $donation = Donations::where('id', $request->donationId)->first();



        $donation = Donations::where('id', $request->donationId)->first();

        if (!$donation) {
            return redirect()->back()->with('error', 'Donation not found');
        }

        if ($request->total_amount > $donation->usd_amount) {
            return redirect()->back()->with('error', 'Refund amount exceeds donation amount');
        }

        $remainingAmount = $donation->usd_amount - $request->total_amount;
        $status = $remainingAmount > 0 ? 'PartiallyRefunded' : 'Refunded';

        $refundStatus = $status;
        $refundNotes = $request->refund_notes ?? '';

        refundDonation::create([
            'doid' => $request->donationId,
            'refund_id' => $processRefund['data']['xRefNum'],
            'refund_amount' => $request->total_amount,
            'refund_status' => $processRefund['data']['xStatus'] ? $processRefund['data']['xStatus'] : 'Failed',
            'refund_notes' =>  $request->refund_notes,
            'refund_message' => $processRefund['data']['xError'] ? $processRefund['data']['xError'] : 'Refund processed successfully',
            'payment_method' => $request->payment_method,
            "created_at" => date('Y-m-d H:i:s'),
            "schedule_message" => $processRefund['data']['xStatus'],
            "notes" => $request->refund_notes ?? 'rfund',
            "refund_date" => date('Y-m-d H:i:s')
        ]);

        if ($processRefund['success']) {
            $donation->update([
                'status' => $status,
                'usd_amount' => $remainingAmount,
                'amount' => $remainingAmount,
                "updated_at" => date('Y-m-d H:i:s')
            ]);
        }

        if ($processRefund['success']) {
            return redirect()->back()->with('success', 'Refund processed successfully');
        } else {
            return redirect()->back()->with('error', 'Refund processing failed: ' . $processRefund['data']['xError']);
        }
    }


    public function processRefund($request)
    {
        $donationId = $request->input('donationId');
        $amount = $request->input('total_amount');
        $paymentMethod = $request->input('payment_method');
        $transactionId = $request->input('txn_id');
        $refundNotes = $request->input('refund_notes');
        $currency = $request->input('donCurrency');
        $subscriptionId = $request->input('subs_id');

        switch ($paymentMethod) {
            case 'cardknox':
                $cardknoxService = App::make(CardknoxService::class);
                return $cardknoxService->processCardknoxRefund($request, $transactionId, $amount, $refundNotes);
            default:
                return ['success' => false, 'error' => 'Invalid payment method'];
        }
    }
}
