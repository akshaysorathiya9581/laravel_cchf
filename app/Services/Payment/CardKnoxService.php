<?php

namespace App\Services\Payment;

use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Http;


class CardknoxService
{
    protected $apiKey;
    // protected $apiKey;
    protected $softwareName;
    protected $url;

    // public function __construct()
    public function __construct()
    {
        $this->url = "https://x1.cardknox.com/gatewayjson";
    }

    public function processPayment($request)
    {
        $is_recurring = $request->don_recurring ?? 0;
        $expiry = explode('/', $request->expiry);

        if ($is_recurring == 0) {
            try {
                $response = Http::post($this->url, [
                    'xKey' => $request->paymentMethodConfig->api_key,
                    'xSoftwareName' => $request->paymentMethodConfig->pin,
                    'xVersion' => '4.5.9',
                    'xCommand' => 'cc:sale',
                    'xSoftwareVersion' => '2.0',
                    'xAmount' => $request->amount,
                    'xCardNum' => $request->xCardNum,
                    'xExp' => $expiry ? $expiry[0] . $expiry[1] : '',
                    'xCVV' => $request->xCVV,
                    'xName' => $request->xName,
                    'xZip' => $request->zipcode,
                    'xComments' => 'Donation',
                    'xEmail' => $request->donor_email,
                    'xBillFirstName' => $request->donor_first_name,
                    'xBillLastName' => $request->donor_last_name,
                    'xBillZip' => $request->zipcode,
                    'xCustReceipt' => 'True',
                    'xCurrency' => 'USD',
                    'xBillStreet' => $request->address,
                    'xBillCity' => $request->city,
                    'xBillState' => $request->state,
                    'xBillCountry' => $request->country,
                    'xBillPhone' => $request->donor_phone
                ]);

                if (empty($response['xError'])) {
                    return ['success' => true, 'paymentIntent' => $response];
                } else {
                    return ['success' => false, 'paymentIntent' => $response];
                }
            } catch (\Exception $e) {
                throw new \Exception($e->getMessage());
            }
        } else {
            $url = 'https://api.cardknox.com/recurring';

            try {
                $response = Http::post($url, [
                    "xKey" =>  $request->paymentMethodConfig->api_key,
                    "xVersion" => "1.0.0",
                    "xSoftwareName" => $request->paymentMethodConfig->pin,
                    "xSoftwareVersion" => "2.0",
                    "xCommand" => "customer:add",
                    "xEmail" => $request->donor_email,
                    "xBillFirstName" => $request->donor_first_name,
                    "xBillLastName" => $request->donor_last_name,
                    "xBillZip" => $request->zipcode,
                ]);

                $responseBody = $response->getBody()->getContents();

                parse_str($responseBody, $parsedResponse);

                if (isset($parsedResponse['xStatus']) && $parsedResponse['xStatus'] == 'E') {
                    throw new \Exception($parsedResponse['xMessage'] ?? 'Unknown error');
                }


                $customerID = $parsedResponse['xCustomerID'];

                $paymentMethodResponse = $this->addPaymentMethod($request, $customerID);



                // if ($paymentMethodResponse['xStatus'] == 'E') {
                //     throw new \Exception($paymentMethodResponse['xMessage']);
                // }

                $scheduleResponse = $this->scheduleRecurringPayment($request, $customerID);


                $scheduleResponse['xRefNum'] = $scheduleResponse['xGatewayRefnum'] ?? '';
                $scheduleResponse['xError'] = $scheduleResponse['xMessage'] ?? '';



                if ($scheduleResponse['xStatus'] == 'E') {
                    return ['success' => false, 'paymentIntent' => $scheduleResponse];
                }

                return ['success' => true, 'scheduleID' => $scheduleResponse['xScheduleID'], 'paymentIntent' => $scheduleResponse];
            } catch (\Exception $e) {
                throw new \Exception($e->getMessage());
            }
        }
        // }
    }

    protected function scheduleRecurringPayment($request, $customerID)
    {
        $url = 'https://api.cardknox.com/recurring';
        $intervalType = ucfirst(strtolower($request->recurring));

        $intervalMapping = [
            'Daily' => 'Day',
            'Weekly' => 'Week',
            'Monthly' => 'Month',
            'Yearly' => 'Year'
        ];
        $mappedIntervalType = $intervalMapping[$intervalType] ?? 'Month';

        $schAmount = $request->amount / $request->recurring_intervals;

        $response = Http::post($url, [
            "xKey" => $request->paymentMethodConfig->api_key,
            "xVersion" => "1.0.0",
            "xSoftwareName" => $request->paymentMethodConfig->pin,
            "xSoftwareVersion" => "2.0",
            "xCommand" => "schedule:add",
            "xIntervalType" => $mappedIntervalType,
            "xAmount" => $schAmount,
            "xTotalPayments" => $request->recurring_intervals,
            "xCustomerID" => $customerID,
            "xCurrency" => 'USD',
            "xDescription" => $intervalType . " Recurring Donation"
        ]);

        $responseBody = $response->getBody()->getContents();
        parse_str($responseBody, $parsedResponse);

        return $parsedResponse;
    }

    protected function addPaymentMethod($request, $customerID)
    {
        $url = 'https://api.cardknox.com/recurring';

        if (!empty($request->xCardNum)) {
            $response = Http::post($url, [
                "xKey" => $request->paymentMethodConfig->api_key,
                "xVersion" => "1.0.0",
                "xSoftwareName" => $request->paymentMethodConfig->pin,
                "xSoftwareVersion" => "2.0",
                "xCommand" => "paymentmethod:add",
                "xCustomerID" => $customerID,
                "xToken" => $request->xCardNum,
                "xTokenType" => "cc",
                "xExp" => implode('', explode('/', $request->expiry)),
                "xName" => $request->xName,
                "xZip" => $request->zipcode
            ]);
        } elseif (!empty($request->xACH)) {
            $response = Http::post($url, [
                "xKey" => $request->paymentMethodConfig->api_key,
                "xVersion" => "1.0.0",
                "xSoftwareName" => $request->paymentMethodConfig->pin,
                "xSoftwareVersion" => "2.0",
                "xCommand" => "paymentmethod:add",
                "xCustomerID" => $customerID,
                "xToken" => $request->xACH,
                "xTokenType" => "check",
                "xRouting" => $request->xRouting,
                "xName" => $request->xAchName,
                "xZip" => $request->zipcode
            ]);
        } else {
            throw new \Exception('Payment method not provided');
        }

        $responseBody = $response->getBody()->getContents();
        parse_str($responseBody, $parsedResponse);

        return $parsedResponse;
    }

    public function processCardknoxRefund($request, $transactionId, $totalAmount, $refundNotes)
    {

        try {
            $url = 'https://x1.cardknox.com/gatewayjson';

            $response = Http::post($url, [
                'xKey' => $request->paymentMethodConfig->api_key,
                'xSoftwareName' => $request->paymentMethodConfig->pin,
                'xVersion' => '4.5.9',
                'xCommand' => 'cc:refund',
                'xSoftwareVersion' => '2.0',
                'xAmount' => $totalAmount,
                'xRefNum' => $transactionId,
                'xComments' => $refundNotes,
            ]);

            $responseBody = $response->getBody()->getContents();
            $parsedResponse = json_decode($responseBody, true);

            if (isset($parsedResponse['xResult']) && $parsedResponse['xResult'] !== 'E') {
                return [
                    'success' => true,
                    'message' => $parsedResponse['xStatus'] ?? 'Operation successful',
                    'data' => $parsedResponse
                ];
            } else {
                return [
                    'success' => false,
                    'message' => $parsedResponse['xError'] ?? 'Unknown error occurred',
                    'data' => $parsedResponse
                ];
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
    public function getCardKnoxRecurring($paymentMethod, $transaction_id, $subscription_id)
    {
        try {
            $url = "https://api.cardknox.com/recurring";
            $response = Http::post($url, [
                'xKey' => $paymentMethod->api_key,
                'xVersion' => '1.0.0',
                'xSoftwareName' => $paymentMethod->pin,
                'xSoftwareVersion' => '2.0',
                'xCommand' => 'report:schedule',
                'xScheduleID' => $subscription_id,
            ]);
            $upcoming_response = Http::post($url, [
                'xKey' => $paymentMethod->api_key,
                'xVersion' => '1.0.0',
                'xSoftwareName' => $paymentMethod->pin,
                'xSoftwareVersion' => '2.0',
                'xCommand' => 'report:scheduleupcoming',
                'xScheduleID' => $subscription_id,
            ]);
            $responseBody = $response->body();
            $upcomingResponseBody =$upcoming_response->body();
            parse_str($responseBody, $parsedResponse);
            parse_str($upcomingResponseBody, $parsedUpcomingResponse);
            if (isset($parsedResponse['xReportData']) && $parsedUpcomingResponse['xReportData']) {
                $reportData = urldecode($parsedResponse['xReportData']);
                $jsonReportData = json_decode($reportData, true);
                $upcomingreportData = urldecode($parsedUpcomingResponse['xReportData']);
                $upcoming_details = json_decode($upcomingreportData, true);
                return [
                    'success' => true,
                    'message' => $parsedResponse['xStatus'] ?? 'Operation successful',
                    'data' => $jsonReportData,
                    'upcoming_details' => $upcoming_details,
                ];
            } else {
                return [
                    'success' => false,
                    'message' => $parsedResponse['xError'] ?? 'Unknown error occurred',
                    'data' => $parsedResponse
                ];
            }

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
