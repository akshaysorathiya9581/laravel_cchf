<?php


namespace App\Services\Payment;

use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\App;
use AWS\CRT\HTTP\Request;
use Illuminate\Support\Facades\Log;

class DonorsFund
{

    public function processPayment($request, $paymentMethodConfig)
    {
        try {
            $don_recurring = $request->don_recurring ?? 0;
            $payment_env = config('app.payment_env');

            $DFD_TaxID = $paymentMethodConfig->pin;
            $DFD_Valid_Token = $paymentMethodConfig->public_key;
            $DFD_API_Key = $paymentMethodConfig->api_key;

            $DFD_Endpoint = $payment_env == "live"
                ? "https://api.thedonorsfund.org/thedonorsfund/integration/"
                : "https://api.tdfcharitable.org/thedonorsfund/integration/";

            $CardDFD = $request->dfd_card_num;
            $CvvDFD = $request->dfd_cvc;
            $recurring = $request->recurring;
            $payableAmount = $don_recurring == 0
                ? $request->usd_amount
                : $request->usd_amount / $request->recurring_intervals;
            $donRecCycle =  $request->recurring_intervals;
            $transDate = date('Y-m-d');
            $payNote = "Donated by " . $request->donor_first_name . " " . $request->donor_last_name;
            $chDFD = curl_init();
            curl_setopt($chDFD, CURLOPT_URL, $DFD_Endpoint . 'create');
            curl_setopt($chDFD, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($chDFD, CURLOPT_POST, true);
            $payload = [
                'taxId' => $DFD_TaxID,
                'amount' => $payableAmount,
                'donor' => $CardDFD,
                'donorAuthorization' => $CvvDFD,
                'purposeType' => 'Donation',
                'purposeNote' => $payNote
            ];

            if ($don_recurring != 0) {
                $payload['recurring'] = [
                    'scheduleType' => strtolower($recurring),
                    'startDate' => $transDate,
                    'numberOfPayments' => $donRecCycle
                ];
            }
            curl_setopt($chDFD, CURLOPT_POSTFIELDS, json_encode($payload));
            $headers = [
                'Accept: */*',
                'Validation-Token: ' . $DFD_Valid_Token,
                'Api-Key: ' . $DFD_API_Key,
                'Content-Type: application/json'
            ];
            curl_setopt($chDFD, CURLOPT_HTTPHEADER, $headers);

            $resultPaymentDFD = curl_exec($chDFD);
            curl_close($chDFD);
            $paymentDataDFD = json_decode($resultPaymentDFD, true);

            // dd($paymentDataDFD);
            if ($paymentDataDFD['data']['status'] == 'Approved' || $paymentDataDFD['errorCode'] === 0) {
                return [
                    'success' => true,
                    'paymentIntent' => $paymentDataDFD['data']
                ];
            } else {
                Log::error('API Response:', $paymentDataDFD);
                throw new \Exception($paymentDataDFD['message'] ?? 'Payment processing failed.');
            }
        } catch (\Exception $e) {
            Log::error('Payment Error: ' . $e->getMessage());

            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }
}
