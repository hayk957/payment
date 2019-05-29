<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class PaymentsController extends Controller
{
    public function pay(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $token = request('stripeToken');
        $amount = $_POST['amount'];
        $charge = Charge::create([
            'amount' => $amount*100,
            'currency' => 'usd',
            'description' => 'Test Book',
            'source' => $token,
        ]);

        return 'Payment Success!';
    }
}