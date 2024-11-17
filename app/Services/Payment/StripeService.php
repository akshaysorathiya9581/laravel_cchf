<?php

namespace App\Services\Payment;

use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Source;
use Stripe\Customer;
use Stripe\PaymentMethod;
use Stripe\Subscription;
use Stripe\Price;

class StripeService
{
    public function createPaymentIntent($request)
    {


        Stripe::setApiKey($request->paymentMethodConfig->api_key);

        $product_id = $request->paymentMethodConfig->pin;
        $is_recurring = $request->don_recurring ?? 0;
        $intervalType = $request->recurring;
        $recurring_interval = $intervalType == "Daily" ? "Day" : ($intervalType == "Weekly" ? "Week" : ($intervalType == "Monthly" ? "Month" : "Year"));
        $total_amount = $request->usd_amount;
        $recurring_intervals = $request->recurring_intervals;

        if ($is_recurring == 1) {
            try {
                $paymentMethod = PaymentMethod::create([
                    'type' => 'card',
                    'card' => ['token' => $request->stripeToken],
                ]);
                $customer = Customer::create([
                    'email' => $request->donor_email,
                    'name' => $request->donor_first_name . ' ' . $request->donor_last_name,
                    'payment_method' => $paymentMethod->id,
                    'invoice_settings' => ['default_payment_method' => $paymentMethod->id],
                    "description" => "Stripe recurring Payment",
                    'phone' => $request->donor_phone,
                    'address' => [
                        'line1' => $request->address,
                        'city' => $request->city,
                        'state' => $request->state,
                        'country' => $request->country,
                        'postal_code' => $request->zipcode,
                    ],
                ]);

                if ($recurring_intervals <= 0) {
                    throw new \Exception('Installment duration must be greater than zero');
                }
                $installment_amount = ceil($total_amount / $recurring_intervals);

                $price = Price::create([
                    'unit_amount' => $installment_amount * 100,
                    'currency' => $request->currency,
                    'recurring' => ['interval' => strtolower($recurring_interval)],
                    'product' => $product_id,
                ]);

                $subscription = Subscription::create([
                    'customer' => $customer->id,
                    'items' => [
                        ['price' => $price->id],
                    ],
                    'metadata' => [
                        'total_amount' => $total_amount,
                        'installment_cycles' => $recurring_intervals,
                        'recurring_interval' => strtolower($recurring_interval),
                    ],
                ]);
                if ($subscription->status == 'active' || $subscription->status == 'trialing') {
                    $paymentMethod = PaymentMethod::retrieve($paymentMethod->id);
                    $cardDetails = [];
                    $cardDetails = $paymentMethod->card;
                    $cardDetails['sub_id'] = $subscription->id;
                    return ['success' => true, 'paymentIntent' => $cardDetails];
                } else {
                    throw new \Exception('Subscription creation failed : ' . $subscription->status);
                }
            } catch (\Exception $e) {
                return ['success' => false, 'error' => $e->getMessage()];
            }
        } else {
            try {
                $source = Source::create([
                    'type' => 'card',
                    'token' => $request->stripeToken,
                ]);
                $paymentIntent = PaymentIntent::create([
                    "amount" => $request->amount * 100,
                    "currency" => "usd",
                    "source" => $source->id,
                    "description" => "Stripe One Time Payment",
                    'payment_method_types' => ['card'],
                    'off_session' => true,
                    'confirmation_method' => 'automatic',
                    'confirm' => true
                ]);

                if ($paymentIntent->status == 'succeeded') {
                    $cardDetails = $source->card;
                    return ['success' => true, 'paymentIntent' => $cardDetails];
                } else {
                    throw new \Exception($paymentIntent->status ?? 'Unknown error');
                }
            } catch (\Exception $e) {
                return ['success' => false, 'error' => $e->getMessage()];
            }
        }
    }

    public function getStripeRecurring($paymentMethod,$transaction_id,$subscription_id){
         $stripe = new \Stripe\StripeClient($paymentMethod->api_key);
        try {
          $getSubscription = $stripe->subscriptions->retrieve($subscription_id);
        return $getSubscription;
        } catch (\Stripe\Exception\CardException $e) {
          $refundMessage = $e->getError()->message;
        }
    }
}
