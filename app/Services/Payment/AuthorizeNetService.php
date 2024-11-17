<?php

namespace App\Services\Payment;

use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Http;
use net\authorize\api\contract\v1\MerchantAuthenticationType;
use net\authorize\api\constants\ANetEnvironment;
use net\authorize\api\controller\CreateTransactionController;
use net\authorize\api\contract\v1\CreateTransactionRequest;
use net\authorize\api\contract\v1\CreditCardType;
use net\authorize\api\contract\v1\CustomerAddressType;
use net\authorize\api\contract\v1\OpaqueDataType;
use net\authorize\api\contract\v1\CustomerDataType;
use net\authorize\api\contract\v1\PaymentType;
use net\authorize\api\contract\v1\TransactionRequestType;
use net\authorize\api\contract\v1\TransactionTypeEnum;
class AuthorizeNetService
{
    protected $merchantAuthentication;

    public function __construct()
    {
        $this->merchantAuthentication = new MerchantAuthenticationType();
        // $this->merchantAuthentication->setName('552ZqqM8');
        // $this->merchantAuthentication->setTransactionKey('99uAdSWw4Y58dh8A');
    }

    public function processPayment($requestPay)
    {
        // dd($requestPay);

        try {
            $payment_env = config('app.payment_env');
            // Set the transaction's refId
            $refId = 'ref' . time();
            $this->merchantAuthentication->setName('552ZqqM8');
            $this->merchantAuthentication->setTransactionKey('99uAdSWw4Y58dh8A');
            
            // Create a payment data object with credit card info
            $creditCard = new CreditCardType();
            $creditCard->setCardNumber($requestPay->cardnumber);
            $creditCard->setExpirationDate($requestPay->cardexpiry);
            $creditCard->setCardCode($requestPay->cvc);
            
            $paymentOne = new PaymentType();
            $setPaymentAmount = $paymentOne->setCreditCard($creditCard);
            
            $transactionRequestType = new TransactionRequestType();
            $transactionRequestType->setTransactionType("authCaptureTransaction");
            $transactionRequestType->setAmount($requestPay->amount);
            $transactionRequestType->setPayment($setPaymentAmount);
        
            $request = new CreateTransactionRequest();
            $request->setMerchantAuthentication($this->merchantAuthentication);
            $request->setRefId($refId);
            $request->setTransactionRequest($transactionRequestType);
        
            if ($requestPay != "USD") {
                $transactionRequestType->setCurrencyCode($requestPay->currency);
            }
            $opaqueData = new OpaqueDataType();
            $opaqueData->setDataDescriptor("COMMON.ACCEPT.INAPP.PAYMENT");
            $opaqueData->setDataValue($requestPay->opaqueDataString);

            $paymentOne = new PaymentType();
            $paymentOne->setOpaqueData($opaqueData);
            $transactionRequestType->setPayment($paymentOne);

            $customerData = new CustomerDataType();
            $customerData->setType("individual");
            $customerData->setId($refId);
            $customerData->setEmail($requestPay->email);
            $transactionRequestType->setCustomer($customerData);

            $billTo = new CustomerAddressType();
            $billTo->setFirstName($requestPay->donor_first_name);
            $billTo->setLastName($requestPay->donor_last_name);
            $billTo->setAddress($requestPay->address);
            $billTo->setCity($requestPay->city);
            $billTo->setState($requestPay->state);
            $billTo->setZip($requestPay->zipcode);
            $billTo->setCountry($requestPay->country);
            $transactionRequestType->setBillTo($billTo);

            $request = new CreateTransactionRequest();
            $request->setMerchantAuthentication($this->merchantAuthentication);
            $request->setRefId($refId);
            $request->setTransactionRequest($transactionRequestType);

             
            $controller = new CreateTransactionController($request);
            $response = $controller->executeWithApiResponse($payment_env === 'test' ? ANetEnvironment::SANDBOX : ANetEnvironment::PRODUCTION);
        
            if ($response != null) {
                $tresponse = $response->getTransactionResponse();

                if (($tresponse != null) && ($tresponse->getResponseCode() == "1")) {
                    $expiryWithoutSlash = str_replace("/", "", $requestPay->cardexpiry);
                    $paymentIntent['cardNumber'] = $tresponse->getAccountNumber() != "" ? substr($tresponse->getAccountNumber(), -4) : substr($tresponse->getAccountNumber(), -4);
                    $paymentIntent['cardType'] = $tresponse->getAccountType();
                    $paymentIntent['cardToken'] = $tresponse->getAuthCode();
                    $paymentIntent['cardExpiry'] = $expiryWithoutSlash;
                    $paymentIntent['payment_method'] = "authorize_net";
                    $paymentIntent['transactionStatus'] = "Paid";                
                    $paymentIntent['paymentID'] = $tresponse->getTransId();
                    return ['success' => true, 'paymentIntent' => $paymentIntent];
               
                  
                } elseif ($tresponse->getResponseCode() == "2") {
                    $errorResponse = "Transaction Declined.";

                    $errors = $tresponse->getErrors();
                    if ($errors != null) {
                        foreach ($errors as $error) {
                            $errorResponse .= " Error: " . $error->getErrorText();
                        }
                    }
                    echo json_encode($errorResponse);
                } else {
                    $errorResponse = "Transaction Error.";
                    $errors = $tresponse->getErrors();
                    if ($errors != null) {
                        foreach ($errors as $error) {
                            $errorResponse .= " Error: " . $error->getErrorText();
                        }
                    }

                    echo json_encode($errorResponse);
                }
            }  else {
                return [
                    'success' => false,
                    'error' => 'No response from payment gateway.'
                ];
            }
        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
        
    }
}
