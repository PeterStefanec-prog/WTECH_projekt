<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class IndexController extends Controller
{
    public function index(string $gender = 'men')   // „men” je default
    {
        $allNewest = Product::with('photos')
            ->where('gender', $gender)
            ->latest()          // = orderBy('created_at','desc')
            ->take(8)
            ->get();

        return view('index', [
            'gender'                     => $gender,
            // first line - first 4 products
            'newest_products'            => $allNewest->slice(0, 4),
            // second line - next 4 products
            'newest_products_second_line'=> $allNewest->slice(4, 4),
        ]);
    }
}

