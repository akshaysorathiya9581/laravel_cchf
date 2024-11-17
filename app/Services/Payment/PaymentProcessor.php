<?php


namespace App\Services\Payment;

use Illuminate\Support\Facades\App;
use App\Models\PaymentMethod;
use App\Services\Payment\AuthorizeNetService;
use App\Services\Payment\UsaePayService;
use App\Services\Payment\CardknoxService;
use App\Services\Payment\Matbia;
use AWS\CRT\HTTP\Request;

class PaymentProcessor
{

    protected $paymentMethod;

    public function __construct(PaymentMethod $paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    public function createPaymentIntent($request, $campaignId)
    {
        $payment_env = config('app.payment_env');

        if ($request->pay_with == 'cardknox') {
            $request->pay_with = 'cardknox_cc';
        }
        $paymentMethodConfig = PaymentMethod::where('campaign_id', $campaignId)
            ->where('environment',  $payment_env)
            ->where('payment_method', $request->pay_with)
            ->firstOrFail();




        $request->paymentMethodConfig = $paymentMethodConfig;

        // $request->recurrence =  false;
        switch ($request->pay_with) {
            case 'stripe':
                $stripeService = App::make(StripeService::class);
                $response = $stripeService->createPaymentIntent($request);
                return $response;

            case 'cardknox_cc':
                $cardknoxService = App::make(CardknoxService::class);
                return $cardknoxService->processPayment($request);

            case 'authorize_net':
                $authorizeNetService = App::make(AuthorizeNetService::class);
                return $authorizeNetService->processPayment($request);

            case 'banquest':
                $bankquestService = App::make(BankquestService::class);
                return $this->processBankquestPayment($bankquestService, $request);

            case 'usaepay':
                $UsaePayService = App::make(UsaePayService::class);
                return $UsaePayService->processPayment($request);

            case 'donors_fund':
                $DonorsFund = App::make(DonorsFund::class);
                return $DonorsFund->processPayment($request, $paymentMethodConfig);

            case 'ojc_fund':
                $OjcFund = App::make(OjcFund::class);
                return $OjcFund->processPayment($request, $paymentMethodConfig);

            case 'matbia':
                $Matbia = App::make(Matbia::class);
                return $Matbia->processPayment($request, $paymentMethodConfig);
            case 'pledger':
                $Pledger = App::make(abstract: Pledger::class);
                return $Pledger->processPayment($request, $paymentMethodConfig);

            default:
                throw new \Exception('Unsupported payment method');
        }
    }

    private function processBankquestPayment(BankquestService $bankquestService,  $request)
    {
        try {
            $parsedData = [];
            parse_str($request->bankquestData, $parsedData);

            $data = [
                'amount' => $request->amount,
                'name' => $request->donor_first_name . ' ' . $request->donor_last_name,
                'transaction_details' => [
                    'clerk' => 'cchf system',
                    'description' => 'Payment at cchf',
                ],
                'billing_info' => [
                    'first_name' => $request->donor_first_name,
                    'last_name' => $request->donor_last_name,
                    'email' => $request->donor_email,
                    'street' => $request->address,
                    'state' => $request->state,
                    'city' => $request->city,
                    'zip' => $request->zipcode,
                    'country' => $request->country,
                    'phone' => $request->donor_phone,
                ],
                'shipping_info' => [
                    'first_name' => $request->donor_first_name,
                    'last_name' => $request->donor_last_name,
                    'street' => $request->address,
                    'state' => $request->state,
                    'city' => $request->city,
                    'zip' => $request->zipcode,
                    'country' => $request->country,
                    'phone' => $request->donor_phone,
                ],
                'customer' => [
                    'email' => $request->donor_email,
                    'first_name' => $request->donor_first_name,
                    'last_name' => $request->donor_last_name,
                ],
                'source' => "nonce-" . $parsedData['nonce'],
                'expiry_month' => (int)$parsedData['expiryMonth'],
                'expiry_year' => (int)$parsedData['expiryYear'],
            ];

            $response = $bankquestService->charge($data);
            // dd($response);
            if ($response['status'] == 'Approved') {
                return response()->json(['success' => true, 'message' => 'Payment successful']);
            } else {
                return response()->json(['success' => false, 'message' => $response['error_message']], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
