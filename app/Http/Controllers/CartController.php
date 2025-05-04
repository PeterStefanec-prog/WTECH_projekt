<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //nacitanie kosika
    public function load()
    {
        if (Auth::check()) {
            // je logged in -> databaza
            $userId = Auth::id();

            $cartItems = CartItem::with('product')
                ->where('user_id', $userId)
                ->orderBy('created_at')
                ->get();

            $total = $cartItems->sum(function ($item) {
                return $item->product->price * $item->quantity;
            });

            return view('shop.shopping_cart', [
                'cartItems' => $cartItems,
                'total' => $total,
                'useDatabase' => true,
            ]);
        }
        else {
            //nie je logged in -> empty
            $cart = session()->get('cart', []);

            if (empty($cart)) {
                return view('shop.shopping_cart', [
                    'cartItems' => [],
                    'total' => 0,
                    'useDatabase' => false,
                ]);
            }

            $productIds = collect($cart)->pluck('id')->all();

            $cartItems = collect(session('cart'))->map(function ($item) {
                $product = Product::find($item['id']);

                if (!$product) return null;

                $product->quantity = $item['quantity'];
                $product->size = $item['size'] ?? null;

                return $product;
            })->filter(); // odstráni null, ak by produkt neexistoval



            $total = $cartItems->sum(function ($item) {
                return $item->price * $item->quantity;
            });

            return view('shop.shopping_cart', [
                'cartItems' => $cartItems,
                'total' => $total,
                'useDatabase' => false,
            ]);
        }
    }

    //pridanie produktu do kosika
    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);
        $size = $request->input('size'); // tu ju získaš

        $product = Product::findOrFail($productId);

        if (Auth::check()) {
            //  DB
            $item = CartItem::where('user_id', Auth::id())
                ->where('product_id', $productId)
                ->where('size', $size) // size ako unikátny variant
                ->first();

            if ($item) {
                $item->quantity += $quantity;
                $item->save();
            } else {
                CartItem::create([
                    'user_id' => Auth::id(),
                    'product_id' => $productId,
                    'quantity' => $quantity,
                    'size' => $size,
                ]);
            }
        } else {
            // Session
            $cart = session()->get('cart', []);

            $index = collect($cart)->search(function ($item) use ($productId, $size) {
                return $item['id'] == $productId && $item['size'] == $size;
            });

            if ($index !== false) {
                $cart[$index]['quantity'] += $quantity;
            } else {
                $cart[] = [
                    'id' => $productId,
                    'quantity' => $quantity,
                    'size' => $size,
                ];
            }

            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Produkt bol pridaný do košíka.');
    }



    //odstranenie produktu z kosika
    public function removeFromCart(Request $request)
    {
        $productId = $request->input('product_id');
        $size = $request->input('size'); // len ak používaš veľkosti

        if (Auth::check()) {
            // Odstrániť z DB
            CartItem::where('user_id', Auth::id())
                ->where('product_id', $productId)
                ->when($size, fn($query) => $query->where('size', $size))
                ->delete();
        } else {
            // Odstrániť zo session
            $cart = session()->get('cart', []);

            $cart = array_filter($cart, function ($item) use ($productId, $size) {
                return !($item['id'] == $productId && ($size ? $item['size'] == $size : true));
            });

            session()->put('cart', array_values($cart)); // reset indexov
        }

        return redirect()->back()->with('success', 'Produkt bol odstránený z košíka.');
    }


    // zmena poctu
    public function updateQuantity(Request $request)
    {
        $productId = $request->input('product_id');
        $size = $request->input('size');
        $change = $request->input('change'); // +1 alebo -1
        // logged in
        if (Auth::check()) {
            $item = CartItem::where('user_id', Auth::id())
                ->where('product_id', $productId)
                ->where('size', $size)
                ->first();

            if ($item) {
                $item->quantity += $change;

                if ($item->quantity <= 0) {
                    $item->delete();
                } else {
                    $item->save();
                }
            }
        }
        // not logged in
        else {
            $cart = session()->get('cart', []);
            foreach ($cart as &$item) {
                if ($item['id'] == $productId && $item['size'] == $size) {
                    $item['quantity'] += $change;
                    if ($item['quantity'] <= 0) {
                        $cart = array_filter($cart, function ($i) use ($item) {
                            return !($i['id'] == $item['id'] && $i['size'] == $item['size']);
                        });
                    }
                    break;
                }
            }
            session()->put('cart', array_values($cart));
        }

        return response()->json(['success' => true]);
    }

}
