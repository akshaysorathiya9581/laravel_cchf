<?php

namespace App\Services\Payment;

use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Http;
use USAePay\API;

class UsaePayService
{
    private $apiKey;
    private $apiPin;
    private $endpoint;

    public function __construct()
    {
        $payment_env = config('app.payment_env');
        $this->endpoint = $payment_env === "live" ? "secure" : "sandbox";
    }

    public function processPayment($paymentData)
    {
        try {
            $client = new API();
            $client->setAuthentication($paymentData->paymentMethodConfig->api_key, $paymentData->paymentMethodConfig->pin);
            $client->setSubdomain($this->endpoint);

            $isRecurring = $paymentData->don_recurring ?? 0;
            $occurrences = $isRecurring == 1 ? $paymentData->recurring_intervals : 1;
            if ($occurrences == 0) {
                $occurrences = 1;
            }
            $donatedAmount = $paymentData->usd_amount / $occurrences;

            $customerData = $isRecurring == 1 ? [
                'save_customer' => true,
                'save_customer_paymethod' => true,
            ] : [];

            $transactionData = $this->prepareTransactionData($paymentData, $donatedAmount, $customerData);
            $response = $client->runCall('post', '/transactions', $transactionData);

            if ($isRecurring == 1) {
                $this->scheduleRecurringPayment($client, $paymentData, $donatedAmount, $response);
            }
            return $this->handleResponse($response);
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    private function prepareTransactionData($paymentData, $donatedAmount, $customerData)
    {
        return [
            'command' => 'cc:sale',
            'amount' => $donatedAmount,
            'currency' => $paymentData->currency,
            'amount_detail' => [
                'tax' => '0.00',
                'subtotal' => $donatedAmount,
            ],
            'billing_address' => $paymentData->address,
            'custemailaddr' => $paymentData->donor_email,
            'payment_key' => $paymentData->payment_key,
        ]  + $customerData;
    }

    private function scheduleRecurringPayment($client, $paymentData, $donatedAmount, $customerData)
    {
        // dd($paymentData);
        try {
            $startDate = date('Y-m-d');
            $nextChargeDate = $this->calculateNextChargeDate($paymentData->recurring);
            $cyclesLeft = $paymentData->recurring_intervals - 1;

            $data = [
                'command' => 'cc:recurring',
                'amount' => $donatedAmount,
                'amount_detail' => [
                    'tax' => '0.00',
                    'subtotal' => $donatedAmount,
                ],
                'billing_address' => [
                    'firstname' => $paymentData->donor_first_name,
                    'lastname' => $paymentData->donor_last_name,
                    'street' => $paymentData->address,
                    'postalcode' => $paymentData->zipcode,
                    'phone' => $paymentData->donor_phone,
                    'email' => $paymentData->donor_email,
                ],
                'custemailaddr' => $paymentData->donor_email,
                'payment_key' => $paymentData->payment_key,
                'enabled' => true,
                'currency_code' => $paymentData->currency,
                'frequency' => strtolower($paymentData->recurring),
                'next_date' => $nextChargeDate,
                'numleft' => $cyclesLeft,
                'start_date' => $startDate,
                'skip_count' => 1,
                'type' => strtolower($paymentData->recurring),
                'rules' => [
                    'day_offset' => date('d'),
                    'month_offset' => '0',
                    'subject' => 'Day',
                ],
                'description' => 'Recurring Payment',

            ];
            // dd($data);

            $endpoint = '/customers/' . $customerData->customer->custkey . '/billing_schedules';

            return $client->runCall('post', $endpoint, $data);
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }
    private function calculateNextChargeDate($recurringType)
    {
        return match ($recurringType) {
            'Monthly' => date('Y-m-d', strtotime('+1 month')),
            'Weekly' => date('Y-m-d', strtotime('+1 week')),
            'Daily' => date('Y-m-d', strtotime('+1 day')),
            default => date('Y-m-d', strtotime('+1 day')),
        };
    }
    private function handleResponse($response)
    {
        if ($response->result_code == 'E' && $response->result == 'Error') {
            return [
                'success' => false,
                'paymentIntent' => $response
            ];
        }
        return [
            'success' => true,
            'paymentIntent' => $response
        ];
    }

    public function getUSAePayRecurring($paymentMethod, $customer_id)
    {
        try {
            $client = new API();
            $client->setAuthentication($paymentMethod->api_key, $paymentMethod->pin);

            $client->setSubdomain($this->endpoint);
            $endpoint = '/customers/' . $customer_id . '/billing_schedules';
            $response = $client->runCall('get', $endpoint);
            if (isset($response->data)) {
                return [
                    'success' => true,
                    'schedules' => $response->data[0]
                ];
            } else {
                return [
                    'success' => false,
                    'message' => 'No schedules found'
                ];
            }
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }
}
