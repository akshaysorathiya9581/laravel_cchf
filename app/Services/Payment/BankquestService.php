<?php


namespace App\Services\Payment;

use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Http;

class BankquestService
{
    protected $apiUrl;
    protected $sourceKey;
    protected $apiPin;

    public function __construct()
    {
        // $campaignId = 5;
        // $payment_env = config('app.payment_env');
        // $methods_keyPenUrl = PaymentMethod::where('environment',$payment_env)
        // ->where('payment_method','banquest')
        // ->where('campaign_id',$campaignId)
        // ->first();
        $this->apiUrl = 'V6cEiehMIQUzGRWwJ0Kyl2RxILJ271AD';
        $this->sourceKey = 'pk_FPf1fysqrqlSH0VPzILZFR8ks4wwM';
        $this->apiPin = '123456';

        // $this->apiUrl = config('services.bankquest.api_url');
        // $this->sourceKey = config('services.bankquest.api_key');
        // $this->apiPin = config('services.bankquest.api_pin');
    }

    public function charge(array $data)
    {
        $url = $this->apiUrl . 'transactions/charge';
        return $this->makeRequest('POST', $url, $data);
    }

    public function createCustomer(array $data)
    {
        $url = $this->apiUrl . 'customers';
        return $this->makeRequest('POST', $url, $data);
    }

    public function createPaymentMethod($customerId, array $data)
    {
        $url = $this->apiUrl . 'customers/' . $customerId . '/payment-methods';
        return $this->makeRequest('POST', $url, $data);
    }

    public function createRecurringSchedule($customerId, array $data)
    {
        $url = $this->apiUrl . 'customers/' . $customerId . '/recurring-schedules';
        return $this->makeRequest('POST', $url, $data);
    }

    protected function makeRequest($method, $url, $data)
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic ' . base64_encode("{$this->sourceKey}:{$this->apiPin}")
        ])->send($method, $url, [
            'json' => $data
        ]);

        return $response->json();
    }
}
