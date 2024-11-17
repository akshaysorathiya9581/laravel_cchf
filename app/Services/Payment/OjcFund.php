<?php


namespace App\Services\Payment;

use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\App;
use AWS\CRT\HTTP\Request;
use Illuminate\Support\Facades\Log;

class OjcFund
{

    public function processPayment($request, $paymentMethodConfig)
    {
        try {

            $ojcPassword = $paymentMethodConfig->pin;
            $ojcUserName = $paymentMethodConfig->public_key;
            $ojcApiKey = $paymentMethodConfig->api_key;

            $don_recurring = $request->don_recurring ?? 0;
            $donatedAmount = $request->usd_amount;
            $SplitByMonths = $don_recurring == '0' ? '0' : $request->recurring_intervals;
            $ojcCardExpiry = str_replace("/", "", $request->ojc_expiry);
            $ojcCardNumber = $request->ojc_card_num;

            $url = 'https://api.ojcfund.org:3391/api/vouchers/processcharitycardtransaction';

            $dataOJC = [
                "CardNo" => $ojcCardNumber,
                "ExpDate" => $ojcCardExpiry,
                "OrgId" => $ojcApiKey,
                "Amount" => $donatedAmount,
                "SplitByMonths" => $SplitByMonths
            ];

            $ojcUserPassword = base64_encode($ojcUserName . ":" . $ojcPassword);

            $response = Http::withHeaders([
                'Authorization' => 'Basic ' . $ojcUserPassword,
                'Content-Type' => 'application/json'
            ])->post($url, $dataOJC);


            if ($response->successful()) {
                $resultOJC = $response->body();
                $cardNumber = substr($ojcCardNumber, -4);
                $cardType = 'OJC Charity Card';
                $cardExpiry = $ojcCardExpiry;
                $paymentID = $resultOJC;
                $scheduleID = $don_recurring == 0 ? "" : $paymentID;
                // dd($resultOJC);
                $paymentIntent = [
                    'cardNumber' => $cardNumber,
                    'cardType' => $cardType,
                    'cardExpiry' => $cardExpiry,
                    'paymentID' => $paymentID,
                ];

                return [
                    'success' => true,
                    'paymentIntent' => $paymentIntent,
                ];
            } else {
                $errorResponse = $response->body();
                return [
                    'success' => false,
                    'message' => 'Transaction Failed: ' . $errorResponse,
                ];
            }
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Error: ' . $e->getMessage(),
            ];
        }
        // try {
        //     // dd($request);
        //     $ojcPassword = $paymentMethodConfig->pin;
        //     $ojcUserName = $paymentMethodConfig->public_key;
        //     $ojcApiKey = $paymentMethodConfig->api_key;

        //     $don_recurring = $request->don_recurring ?? 0;
        //     $donatedAmount = $request->usd_amount;
        //     // $donAmount = !empty($donatedAmount) ? $donatedAmount : 0;
        //     $SplitByMonths = $don_recurring == '0' ? '0' : $request->recurring_intervals;
        //     $ojcCardExpiry = str_replace("/", "", $request->ojc_expiry);
        //     $CardOJC = $request->ojc_card_num;
        //     $dataOJC = array("CardNo" => $CardOJC, "ExpDate" => $ojcCardExpiry, "OrgId" => $ojcApiKey, "Amount" => $donatedAmount, "SplitByMonths" => $SplitByMonths);

        //     $postOJCData = json_encode($dataOJC);
        //     $ojcUserPassword = $ojcUserName . ":" . $ojcPassword;

        //     $chOJC = curl_init("https://api.ojcfund.org:3391/api/vouchers/processcharitycardtransaction");
        //     curl_setopt($chOJC, CURLOPT_POST, 1);
        //     curl_setopt($chOJC, CURLOPT_POSTFIELDS, $postOJCData);
        //     curl_setopt($chOJC, CURLOPT_RETURNTRANSFER, 1);
        //     curl_setopt($chOJC, CURLOPT_USERPWD, $ojcUserPassword);
        //     curl_setopt($chOJC, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        //     curl_setopt($chOJC, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        //     $resultOJC = curl_exec($chOJC);
        //     $curlHttpCode = curl_getinfo($chOJC, CURLINFO_HTTP_CODE);
        //     curl_close($chOJC);
        //     $cardNumber = substr($CardOJC, -4);
        //     $cardType = 'OJC Charity Card';
        //     $cardToken = "";
        //     $cardExpiry = $ojcCardExpiry;
        //     $ojcMethod = "OJC";
        //     $errorResponse = $curlHttpCode != "200" ? str_replace('"', '', $resultOJC) : "";
        //     $ojcCustomerID = "";
        //     $transactionStatus = $curlHttpCode != "200" ? "Failed" : "Paid";
        //     $paymentID = $curlHttpCode == "200" ? $resultOJC : "";
        //     $scheduleID = $don_recurring == 0 ? "" : $paymentID;
        //     $DonationKey = str_pad(rand(0, 999999999999999), 16, '0', STR_PAD_LEFT);

        //     if ($curlHttpCode == 200) {
        //         $paymentIntent = [
        //           'cardNumber' => $cardNumber,
        //           'cardType' => $cardType,
        //           'cardExpiry' => $cardExpiry,
        //           'paymentID' => $paymentID,
        //         ];
        //         return [
        //             'success' => true,
        //             'paymentIntent' => $paymentIntent,
        //         ];

        //     } else {
        //         throw new \Exception($resultOJC . 'Donation Failed' ?? 'Payment processing failed.');
        //     }
        // } catch (\Exception $e) {
        //     Log::error('Payment Error: ' . $e->getMessage());

        //     return [
        //         'success' => false,
        //         'message' => $e->getMessage()
        //     ];
        // }

    }
}
