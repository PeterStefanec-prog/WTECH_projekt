<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;

class AddressController extends Controller
{
    public function index()
    {
        $address = null;

        if (Auth::check()) {
            // nacitanie adresy
            $address = Address::where('user_id', Auth::id())
                ->latest('updated_at')
                ->first();
        }

        return view('checkout.checkout_address', compact('address'));
    }
}

