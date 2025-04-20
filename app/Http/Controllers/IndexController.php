<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class IndexController extends Controller
{
    public function index()
    {
        // 8 newest products
        $allNewest = Product::with('photos')
            ->orderBy('created_at', 'desc')
            ->take(8)
            ->get();

        // first line - first 4 products
        $newest_products = $allNewest->slice(0, 4);


        // second line - next 4 products
        $newest_products_second_line = $allNewest->slice(4, 4);

        return view('index', compact('newest_products', 'newest_products_second_line'));

    }
}
