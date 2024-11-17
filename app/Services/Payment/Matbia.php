<?php

namespace App\Services\Payment;

use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\App;
use AWS\CRT\HTTP\Request;
use Illuminate\Support\Facades\Log;

class Matbia
{
    public function processPayment($request, $paymentMethodConfig)
    {
        // dd($request);
        try {
            $MTB_API_Token = $request->paymentMethodConfig->api_key;
            $don_recurring = $request->don_recurring ?? 0;
            $payment_env = config('app.payment_env');
            $transactionId = 'TRANS' . time();
            $url = $payment_env === "live" ? "https://beapi.matbia.com/v1/Matbia/" :  "https://matbiabackendapidev.azurewebsites.net/v1/Matbia/";
            $transDate = date('Y-m-d\TH:i:s\Z');
            $payNote = "Donated by " . $request->donor_first_name . " " . $request->donor_last_name;
            $payableAmount = $don_recurring == 0 ? $request->usd_amount : $request->usd_amount / $request->recurring_intervals;
            // $transDate = now()->toISOString();
            $matbiaCardNumber = $request->mtb_card_num;
            $matbiaCardExpiry = str_replace("/", "", $request->mtb_expiry);
            $MTB_API_Method = $don_recurring == 1 ? "Schedule" : "Charge";
            $headers = [
                'Authorization' => 'Bearer ' . $MTB_API_Token,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ];

            $responsePreAuth = Http::withHeaders($headers)
            ->post($url . 'Preauthorization', [
                'cardNum' => $matbiaCardNumber,
                'exp' => $matbiaCardExpiry,
            ]);

            $preAuthData = $responsePreAuth->json();
            // dd($preAuthData);
            if (isset($preAuthData['error']) && !empty($preAuthData['error'])) {
                $errorMessage = $preAuthData ?? 'Unknown error during preauthorization';
                Log::error('Preauthorization error: ' . $errorMessage);
                return [
                    'success' => false,
                    'message' => $errorMessage
                ];
            }

            $paymentData = [
                "orgUserHandle" =>  $request->paymentMethodConfig->pin,
                "orgTaxId" =>  $request->paymentMethodConfig->pin,
                "orgEmail" =>  $request->paymentMethodConfig->public_key,
                "orgName" =>  $request->paymentMethodConfig->private_key,
                "orgPhoneNumber" =>  $request->donor_phone, 
                "orgStreet" =>  $request->address,
                "orgCity" =>  $request->city,
                "orgState" =>  $request->state,
                "orgZip" =>  $request->zipcode,
                "cardNum" =>  $request->mtb_card_num,
                "exp" =>  $matbiaCardExpiry,
                'note' => $payNote,
                'externalTransactionId' =>$transactionId
            ];

            if ($don_recurring == 1) {
                $frequencyMTB = $don_recurring === "Monthly" ? 4 : ($don_recurring === "Weekly" ? 2 : 1);
                $paymentData['amountPerPayment'] = $payableAmount;
                $paymentData['scheduleStartDate'] = $transDate;
                $paymentData['count'] = $request->recurring_intervals;
                $paymentData['frequency'] = $frequencyMTB;
            } else {
                $paymentData['amount'] = $payableAmount;
                $paymentData['transDate'] = $transDate;
            }

            $responsePayment = Http::withHeaders($headers)->post($url . $MTB_API_Method, $paymentData);
            $paymentData = $responsePayment->json();
            if ($responsePayment->failed()) {
                    $errorMessage = $responsePayment->json()['error'] ?? 'Unknown error during payment processing';
                    Log::error('Payment processing error: ' . $errorMessage);
                    throw new \Exception($errorMessage);
                } 
            if (isset($paymentData['error']) && !empty($paymentData['error'])) {
                Log::error(message: 'Payment processing error: ' . json_encode($paymentData['error']));
                return [
                    'success' => false,
                    'message' => $paymentData['error']
                ];
            }
            
            // dd($paymentData); 
            $cardNumber = substr($request->mtb_card_num, -4);
            $cardType = 'Matbia Card';
            $cardToken = "";
            $cardExpiry = str_replace("/", "", $request->mtb_expiry);
            $mtbMethod = "Matbia";
            $transactionStatus = $paymentData['status'] === "Error" ? "Failed" : "Paid";
            $paymentID = $paymentData['status'] === "Success" ? $paymentData['referenceId'] : "";
            $scheduleID = $don_recurring === 0 ? "" : $paymentID;

            // Return success response
            return [
                'success' => $transactionStatus === "Paid",
                'message' => $transactionStatus === "Paid" ? 'Payment successful' : 'Payment failed',
                'paymentIntent' => [
                    'cardNumber' => $cardNumber,
                    'cardType' => $cardType,
                    'cardToken' => $cardToken,
                    'cardExpiry' => $cardExpiry,
                    'mtbMethod' => $mtbMethod,
                    'transactionStatus' => $transactionStatus,
                    'paymentID' => $paymentID,
                    'scheduleID' => $scheduleID
                ]
            ];
        } catch (\Exception $e) {
            Log::error('Payment Error: ' . $e->getMessage());

            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }
}
