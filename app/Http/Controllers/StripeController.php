<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\StripeService;
use Exception;

class StripeController extends Controller
{
    protected $stripeService;

    public function __construct(StripeService $stripeService)
    {
        $this->stripeService = $stripeService;
    }

    public function showPaymentForm()
    {
        return view('frontend.stripe.payment');
    }

    public function processPayment(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'stripeToken' => 'required',
        ]);

        try {
            $charge = $this->stripeService->createCharge(
                $request->amount * 100, // Convert to cents
                'usd',
                $request->stripeToken,
                'Payment description'
            );

            return back()->with('success', 'Payment successful!');
        } catch (Exception $e) {
            
            return back()->with('error', $e->getMessage());
        }
    }
}
