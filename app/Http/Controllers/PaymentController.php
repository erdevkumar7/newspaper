<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;


class PaymentController extends Controller
{
    private $apiContext;

    public function __construct()
    {
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                config('services.paypal.client_id'),     // Client ID
                config('services.paypal.secret')         // Client Secret
            )
        );

        // Optional: Configure additional settings
        $this->apiContext->setConfig([
            'mode' => config('services.paypal.settings.mode'), // 'sandbox' or 'live'
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path('logs/paypal.log'),
            'log.LogLevel' => 'ERROR',  // Adjust log level as needed
        ]);
    }


    public function createPayment(Request $request)
    {
        $validateData = $request->validate([
            'name' => [
                'required',
                'string',
                'max:70',
                'regex:/^[\pL\s]+$/u',
            ],
            'address' => 'required|string|max:100',
            'state' => 'required',
            'city' => 'required',
            'zip_code' => 'required|numeric',

            'billing_name' => [
                'required',
                'string',
                'max:70',
                'regex:/^[\pL\s]+$/u',
            ],
            'billing_address' => 'required|string|max:100',
            'billing_state' => 'required',
            'billing_city' => 'required',
            'billing_zip_code' => 'required|numeric',

            'email' => 'required|string|email:rfc,dns|max:150|unique:users',
        ], [
            'name.regex' => 'Name field must contain only letters and spaces',
            'billing_name.regex' => 'Name field must contain only letters and spaces',
        ]);


        $price = $request->input('plan');

        // Step 3: Create PayPal payment
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $amount = new Amount();
        $amount->setTotal($price);
        $amount->setCurrency("USD");

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription("Subscription for your website");

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('payment.execute'))  // Callback after success
            ->setCancelUrl(route('payment.cancel'));  // Callback if canceled

        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions([$transaction]);

        try {
            $payment->create($this->apiContext);
            return redirect($payment->getApprovalLink());
        } catch (\Exception $ex) {
            return back()->withError('Error processing PayPal payment.');
        }
    }


    public function executePayment(Request $request)
    {
        $paymentId = $request->paymentId;
        $payerId = $request->PayerID;

        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        try {
            $result = $payment->execute($execution, $this->apiContext);
            if ($result->getState() === 'approved') {
                // Logic for successful subscription, e.g., update user subscription status
                return view('user.payment-success');
            }
        } catch (\Exception $ex) {
            return back()->withError('Payment execution failed.');
        }

        return back()->withError('Subscription failed.');
    }

    public function cancelPayment()
    {
        return view('user.payment-cancel');
    }
}
