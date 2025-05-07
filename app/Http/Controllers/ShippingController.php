<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShippingController extends Controller
{
    public function index()
    {
        // Načítame všetky metódy doručenia
        $shippingMethods = DB::table('shipping_methods')->get();

        // Pošleme ich do view
        return view('checkout.checkout_shipping', compact('shippingMethods'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'shipping_method' => ['required','exists:shipping_methods,id'],
        ]);

        session(['shipping_method_id' => $data['shipping_method']]);

        return redirect()->route('payment.loadPaymentOptions');
    }
}
