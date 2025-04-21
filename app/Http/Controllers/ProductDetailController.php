<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductDetailController extends Controller
{
    public function show($id)
    {

        $product = Product::with(['photos', 'sizes'])->findOrFail($id);

        return view('shop.product-detail', compact('product'));
    }


}
