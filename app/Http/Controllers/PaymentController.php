<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function loadPaymentOptions()
    {
        return view('checkout.checkout-choosing-payment');
    }

    public function loadPayment()
    {
        return view('checkout.checkout-payment');
    }
}
