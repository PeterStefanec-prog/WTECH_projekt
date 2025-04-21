<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // read write data to DB products


class ProductsController extends Controller
{
    public function filter(string $gender, ?string $category = null, Request $request)
    {
        $query = Product::with('photos')
            ->where('gender', $gender);

        if ($category) {
            $query->where('category', $category);
        }

        // --- nullable parameters - filters---
        if ($request->filled('color'))   $query->whereIn('color',   $request->color);
        if ($request->filled('brand'))   $query->whereIn('brand',   $request->brand);
        if ($request->filled('max'))     $query->where('price','<=',$request->max);

        // sorting
        switch ($request->input('sort')) {
            case 'price-asc':  $query->orderBy('price');            break;
            case 'price-desc': $query->orderByDesc('price');        break;
            case 'name-asc':   $query->orderBy('name');             break;
            case 'name-desc':  $query->orderByDesc('name');         break;
            default:           $query->latest();                    break; // newest
        }

        // paginnation - 9 products per page
        $products = $query->paginate(9)->withQueryString();

        return view('shop.products-view', [
            'gender'   => $gender,
            'category' => $category,
            'products' => $products,
        ]);
    }
}
