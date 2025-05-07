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

    public function store(Request $request)
    {
        // 1) Validačka – vrátane first_name a last_name
        $data = $request->validate([
            'first_name'  => 'required|string|max:50',
            'last_name'   => 'required|string|max:50',
            'street'      => 'required|string|max:100',
            'city'        => 'required|string|max:50',
            'country'     => 'required|string|max:50',
            'postal_code' => 'required|string|max:20',
            'notes'       => 'nullable|string|max:255',
        ]);

        // 2) Uloženie
        if (Auth::check()) {
            // prihlásený – vždy len jeden záznam na usera
            $address = Address::updateOrCreate(
                ['user_id' => Auth::id()],
                array_merge($data, ['user_id' => Auth::id()])
            );
        } else {
            // guest – vytvor nový, user_id ostane NULL
            $address = Address::create($data);
        }

        // 3) Ulož do session a pokračuj
        session(['address_id' => $address->id]);
        return redirect()->route('shipping.index');
    }

}

