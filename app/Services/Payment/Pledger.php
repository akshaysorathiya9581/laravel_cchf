<?php


namespace App\Services\Payment;

use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\App;
use AWS\CRT\HTTP\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class Pledger
{

    public function processPayment($request, $paymentMethodConfig)
    {
        try {
            $PLG_TaxID = $paymentMethodConfig->pin;
            $PLG_Bearer_Token = $paymentMethodConfig->public_key;

            $AmountPLG = $request->amount;
            $ExpPLG = str_replace("/", "", $request->plg_expiry);
            $CardPLG = $request->plg_card_num;
            $CvvPLG = $request->plg_cvv;
            $payNote = "Donated by " . $request->donor_first_name . " " . $request->donor_last_name;
            $charityName = 'Donor at ' . Config::get('app.name');
            $don_recurring = $request->don_recurring ?? 0;
            $donRecCycle = $request->recurring_cycle ?? 1; 
            $custom07 = uniqid('invoice_'); 
            if ($don_recurring != "0") {
                $startDate = date('Y-m-d');
                $dataPLG = [
                    "TaxID" => $PLG_TaxID,
                    "CharityName" => $charityName,
                    "Command" => "grant:donate",
                    "Cardnumber" => $CardPLG,
                    "CVV" => $CvvPLG,
                    "ExpDate" => $ExpPLG,
                    "Amount" => $AmountPLG,
                    "Invoice" => $custom07,
                    "Description" => $payNote,
                    "RecurringCount" => $donRecCycle,
                    "RecurringType" => $don_recurring,
                    "startDate" => $startDate
                ];
            } else {
                $dataPLG = [
                    "TaxID" => $PLG_TaxID,
                    "CharityName" => $charityName,
                    "Command" => "grant:donate",
                    "Cardnumber" => $CardPLG,
                    "CVV" => $CvvPLG,
                    "ExpDate" => $ExpPLG,
                    "Amount" => $AmountPLG,
                    "Invoice" => $custom07,
                    "Description" => $payNote
                ];
            }

            $postDataPLG = json_encode($dataPLG);

            $chPLG = curl_init("https://api.pledgercharitable.org/api/Funds/Capture");
            curl_setopt($chPLG, CURLOPT_POST, 1);
            curl_setopt($chPLG, CURLOPT_POSTFIELDS, $postDataPLG);
            curl_setopt($chPLG, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($chPLG, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $PLG_Bearer_Token, 'Content-Type: application/json'));
            $resultPaymentPLG = curl_exec($chPLG);
            $curlHttpCode = curl_getinfo($chPLG, CURLINFO_HTTP_CODE);
            curl_close($chPLG);

            $paymentDataPLG = json_decode($resultPaymentPLG, true);

            if ($curlHttpCode == 200 && isset($paymentDataPLG['Status']) && $paymentDataPLG['Status'] == "Approved") {
                $cardNumber = substr($CardPLG, -4);
                $cardType = 'Pledger Charity Card';
                $cardToken = $paymentDataPLG['TransToken'];
                $cardExpiry = $ExpPLG;

                $paymentIntent = [
                    'cardNumber' => $cardNumber,
                    'cardType' => $cardType,
                    'cardExpiry' => $cardExpiry,
                    'paymentID' => $paymentDataPLG['Refnum']
                ];

                return [
                    'success' => true,
                    'paymentIntent' => $paymentIntent,
                ];
            } else {
                $errorMessage = $paymentDataPLG['ErrorMessage'] ?? 'Payment processing failed.';
                throw new \Exception($errorMessage);
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
