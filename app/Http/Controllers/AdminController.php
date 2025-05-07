<?php

namespace App\Http\Controllers; // its controller in this path - laravel can find it base on just name
use Illuminate\Support\Facades\Log;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

// read write data to DB users


class AdminController extends Controller
{
    // zobrazenie hlavnej admin stranky
    public function addProduct()
    {
        return view('admin.admin_add_&_edit_product');
    }


    // CREATE PRODUCT
    public function storeProduct(Request $request)  // handles POST
    {
        // VALIDATE INPUTS
        $data = $request->validate([
            'name'        => ['required','string','max:255'],
            'description' => ['nullable','string'],
            'price'       => ['required','numeric','min:0'],
            'brand'       => ['nullable','string','max:255'],
            'gender'      => ['required','in:men,women,kids'],
            'category'    => ['required','string','max:255'],
            'color'       => ['required','string','max:255'],
            'photos'      => ['required','array','max:4'],
            'photos.*'    => ['image','max:10048'],            // 10 MB each
            'size'       => ['required','array','min:1'],
            'size.*'     => ['in:S,M,L,XL'],
        ]);

        // CREATE THE PRODUCT
        DB::beginTransaction();     // spusti db transakciu - vsetky nasledujuce SQL prikazy nebudu definitivne ulozeen - kym sa nezavola DB:commit
        try {
            $product = Product::create($request->only([
                'name','description','price','brand','gender','category','color'
            ]));

            /*  photos */
            foreach ($request->file('photos') as $file) {
                $path = $file->store('products','public');   // storage/app/public/products - pouzivame lokalne storage aby sme oddelili runtimes files
                $product->photos()->create(['url' => Storage::url($path)]);
            }

            /* 2b) sizes – default stock 0 */
            foreach ($request->input('size') as $size) {
                $product->sizes()->create([
                    'size'  => $size,
                    'stock' => 1,   // default stock
                ]);
            }

            DB::commit();

            return back()->with('success','Produkt bol úspešne pridaný.');
        } catch (\Throwable $e) {
            DB::rollBack(); // ak sa nieco pokazilo, vsetky SQL prikazy sa vratia do povodneho stavu
//            throw $e; // cely error
            Log::error('Product add failed: '.$e->getMessage());
            return back()
                ->withErrors('Nepodarilo sa uložiť produkt – skúste to znova.')
                ->withInput();
        }
    }


    // EDIT PRODUCT
    public function editProduct($id)
    {
        $product = Product::with(['photos', 'sizes'])->findOrFail($id);
        return view('admin.admin_add_&_edit_product', compact('product'));
    }

}

