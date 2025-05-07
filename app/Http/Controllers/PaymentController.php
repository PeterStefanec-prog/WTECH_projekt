<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PaymentMethod;
use App\Models\ShippingMethod;
use App\Models\CartItem;
use App\Models\Product;

class PaymentController extends Controller
{
    //zobrazi stranku s moznostami na platbu
    public function loadPaymentOptions()
    {
        $paymentMethods = PaymentMethod::all();
        return view('checkout.checkout-choosing-payment', compact('paymentMethods'));
    }

    //bud ide na platbu kartou alebo hotovo
    public function loadPayment(Request $request)
    {
        $data = $request->validate([
            'payment_method' => ['required', 'exists:payment_methods,id'],
        ]);
        //do session uklada platobnu metodu
        session(['payment_method_id' => $data['payment_method']]);

        $method = PaymentMethod::findOrFail($data['payment_method']);

        if ($method->name === 'Platobná karta') {
            return view('checkout.checkout-payment');
        }

        // Ne-karta: Finalizacia
        $this->createOrderAndClearCart();
        return redirect()->route('confirmed.index');
    }

    //overenie spravnosti vyplnenia platobnej karty
    public function processPayment(Request $request)
    {
        $request->validate([
            'cardholder'   => ['required', 'regex:/^[A-Za-z\s]+$/'],
            'cardnumber'   => ['required', 'regex:/^\d{4} \d{4} \d{4} \d{4}$/'],
            'expiry-month' => ['required', 'digits:2'],
            'expiry-year'  => ['required', 'digits:4'],
            'cvc'          => ['required', 'digits:3'],
            'email'        => ['required', 'email'],
        ]);


        // Finalizacia
        $this->createOrderAndClearCart();
        return redirect()->route('confirmed.index');
    }

    //vytvori objednavku, vycisti kosik, upravi db
    protected function createOrderAndClearCart(): void
    {
        $userId           = Auth::id();
        $shippingMethodId = session('shipping_method_id');
        $paymentMethodId  = session('payment_method_id');
        $addressId        = session('address_id');

        $shippingMethod   = ShippingMethod::findOrFail($shippingMethodId);
        $shippingCost     = $shippingMethod->cost;

        // Nacitanie kosika
        //prihlaseny - db
        if (Auth::check()) {
            $cartItems = CartItem::with('product.sizes')
                ->where('user_id', $userId)
                ->get();
        }
        //neprihlaseny - session
        else {
            $raw = session('cart', []);
            $cartItems = collect($raw)->map(function ($item) {
                $product = Product::with('sizes')->find($item['id']);
                if (! $product) return null;
                $product->quantity = $item['quantity'];
                $product->size     = $item['size'] ?? null;
                return $product;
            })->filter();
        }

        // celkova cena
        $subtotal = $cartItems->sum(fn ($i) => ((Auth::check() ? $i->product->price : $i->price) * $i->quantity));
        $total    = $subtotal + $shippingCost;

        // ulozenie objednavky
        $order = Order::create([
            'user_id'            => $userId,
            'order_date'         => Carbon::now()->toDateString(),
            'status'             => 'to be shipped',
            'address_id'         => $addressId,
            'payment_method_id'  => $paymentMethodId,
            'shipping_method_id' => $shippingMethodId,
            'total_price'        => $total,
        ]);

        // ulozenie polozie, odpisanie skladu
        foreach ($cartItems as $item) {
            $prodId     = Auth::check() ? $item->product->id : $item->id;
            $price      = Auth::check() ? $item->product->price : $item->price;
            $sizeValue  = $item->size;

            $order->items()->create([
                'product_id' => $prodId,
                'quantity'   => $item->quantity,
                'price'      => $price,
            ]);

            // znizenie na sklade
            if ($sizeValue) {
                $productModel = Auth::check()
                    ? $item->product
                    : Product::with('sizes')->find($prodId);

                if ($productModel) {
                    $sizeRecord = $productModel->sizes()
                        ->where('size', $sizeValue)
                        ->first();

                    if ($sizeRecord) {
                        $sizeRecord->decrement('stock', $item->quantity);
                    }
                }
            }
        }

        // vyprazdnenie kosika
        if (Auth::check()) {
            CartItem::where('user_id', $userId)->delete();
        } else {
            Session::forget('cart');
        }
    }
}
