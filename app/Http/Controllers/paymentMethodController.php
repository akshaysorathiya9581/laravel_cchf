<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\FileUploadException;
use App\Models\Teams;
use Exception;

class paymentMethodController extends Controller
{


    public function getPaymentData(Request $request)
    {
        $payment_env = config('app.payment_env');
        $status = $request->input('payment_check') ?? null;
        $payments = [];
        try {
            $campaignId = $request->input('campaignId');
            $gateway = $request->input('gateway');
            $payments_data = PaymentMethod::where('environment', $payment_env)->where('campaign_id', $campaignId)->where('payment_method', $gateway)->first();
            if (empty($payments_data) || $status == null) {
                $payments[0] = PaymentMethod::where('environment', 'live')
                    ->where('campaign_id', $campaignId)
                    ->where('payment_method', $gateway)
                    ->first();
                $payments[1] = PaymentMethod::where('environment', 'test')
                    ->where('campaign_id', $campaignId)
                    ->where('payment_method', $gateway)
                    ->first();
                return response()->json(['payments' => $payments, 'checkbox' => ''], 201);
            } else {
                if (is_null($payments_data->api_key) || is_null($payments_data->public_key)) {
                    $payments[0] = PaymentMethod::where('environment', 'live')
                        ->where('campaign_id', $campaignId)
                        ->where('payment_method', $gateway)
                        ->first();
                    $payments[1] = PaymentMethod::where('environment', 'test')
                        ->where('campaign_id', $campaignId)
                        ->where('payment_method', $gateway)
                        ->first();
                    return response()->json(['payments' => $payments, 'checkbox' => ''], 201);
                } else {
                    $checkbox_check = PaymentMethod::updateOrCreate(
                        [
                            'payment_method' => $gateway,
                            'campaign_id' => $campaignId,
                            'environment' => $payment_env,
                        ],
                        [
                            'payment_method' => $gateway,
                            'campaign_id' => $campaignId,
                            'environment' => $payment_env,
                            'status' => $status,
                        ]
                    );
                    return response()->json(['checkbox' => $checkbox_check], 201);
                }
            }
        } catch (FileUploadException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        } catch (Exception $e) {
            return response()->json(['error' => 'error while fetch data of modal.'], 400);
        }
    }


    public function update(Request $request, PaymentMethod $paymentMethod)
    {
        $validator = Validator::make($request->all(), [
            'campaignId' => 'required|numeric',
            'payment_method' => 'required|string',
            'api_key' => 'nullable|string',
            'public_key' => 'nullable|string',
            'pin' => 'nullable|string',
            'private_key' => 'nullable|string'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => 'Failed to update.', 'messages' => $validator->errors()], 422);
        }
        $payment_env = config('app.payment_env');
        $test =  [
            'campaign_id' => $request->input('campaignId'),
            'environment' => 'test',
            'status' => ($payment_env == 'test') ? 1 : 0,
            'payment_method' => $request->input('payment_method'),
            'api_key' => $request->input('test_api_key'),
            'public_key' => $request->input('test_public_key'),
            'pin' => $request->input('test_pin'),
        ];
        if ($request->input('test_private_key')) {
            $test['private_key'] = $request->input('test_private_key');
        }
        $live =  [
            'campaign_id' => $request->input('campaignId'),
            'environment' => 'live',
            'status' => ($payment_env == 'live') ? 1 : 0,
            'payment_method' => $request->input('payment_method'),
            'api_key' => $request->input('live_api_key'),
            'public_key' => $request->input('live_public_key'),
            'pin' => $request->input('live_pin'),
        ];
        if ($request->input('live_private_key')) {
            $live['private_key'] = $request->input('live_private_key');
        }
        try {
            $livePayment = PaymentMethod::updateOrCreate(
                [
                    'campaign_id' => $request->input('campaignId'),
                    'environment' => 'live',
                    'payment_method' => $request->input('payment_method')
                ],
                $live
            );
            $testPayment = PaymentMethod::updateOrCreate(
                [
                    'campaign_id' => $request->input('campaignId'),
                    'environment' => 'test',
                    'payment_method' => $request->input('payment_method')
                ],
                $test
            );
            return response()->json(['live_payment' => $livePayment, 'test_payment' => $testPayment], 201);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to update.', 'message' => $e->getMessage()], 500);
        }
    }
}
