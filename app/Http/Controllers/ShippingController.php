<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function index() {
        return view('checkout.checkout_shipping');
    }
}
