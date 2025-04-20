<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class IndexController extends Controller
{
    public function index()
    {
        // Načíta prvé 3 produkty aj s ich fotkami
        $products = Product::with('photos')->take(3)->get();

        return view('index', compact('products'));
    }
}
