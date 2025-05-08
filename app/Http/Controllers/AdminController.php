<?php

namespace App\Http\Controllers;

    use App\Models\Product;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Log;
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Str;

class AdminController extends Controller
{
    // zobrazenie admin add page
    public function addProduct()
    {
        return view('admin.admin_add_&_edit_product');    // bez $product = null
    }

    // zobrazenie admin edit page
    public function editProduct($id)
    {
        $product = Product::with(['photos', 'sizes'])->findOrFail($id);
        return view('admin.admin_add_&_edit_product', compact('product'));
    }

    //  // CREATE PRODUCT
    public function storeProduct(Request $request)
    {
        return $this->saveProduct($request);
    }

    // EDIT PRODUCT
    public function updateProduct(Request $request, $id)
    {
        return $this->saveProduct($request, $id);
    }

    // SAVE THE PRODUCT - for EDIT and CREATE
    protected function saveProduct(Request $r, $id = null)
    {
        // VALIDATE INPUTS (pri edit - photos nemusia byt)
        $data = $r->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'brand' => 'nullable|string|max:255',
            'gender' => 'required|in:men,women,kids',
            'category' => 'required|in:Clothes,Sport,Streetwear,Accessories,Sales',
            'color' => 'required|in:Red,Blue,Green,Black,White',
            'photos' => [$id ? 'sometimes' : 'required', 'array', 'max:4'],
            'photos.*' => 'image|max:10240',
            'size' => 'required|array|min:1',
            'size.*' => 'in:S,M,L,XL',
        ]);

        DB::beginTransaction(); // spusti db transakciu - vsetky nasledujuce SQL prikazy nebudu definitivne ulozeen - kym sa nezavola DB:commit
        try {
            if ($id) {  // edit existujuceho
                $product = Product::findOrFail($id);
                $product->update($r->only(['name', 'description', 'price', 'brand', 'gender', 'category', 'color']));
            } else {    // create noveho
                $product = Product::create($r->only(['name', 'description', 'price', 'brand', 'gender', 'category', 'color']));
            }

            // photos: pri edit vymazeme existujuce
            if ($r->hasFile('photos')) {
                // existujuce obrazky dame do pola
                $existing = $product->photos()->get();  // Collection

                foreach ($r->file('photos') as $index => $file) {
                    // ak v tom slote existoval obrazok, zmazeme ho
                    if (isset($existing[$index])) {
                        $old = $existing[$index];
                        Storage::disk('public')->delete(Str::after($old->url,'/storage/'));
                        $old->delete();
                    }
                    // ulozime updatenuty obrazok do toho slotu
                    $path = $file->store('products','public');
                    $product->photos()->create([
                        'url' => Storage::url($path)
                    ]);
                }
            }

            // SIZES: vymazeem tie, ktore neboli zvolene a sync zvysok
            $product->sizes()->whereNotIn('size', $r->input('size'))->delete();
            foreach ($r->input('size') as $s) {
                $product->sizes()->updateOrCreate(
                    ['size' => $s], ['stock' => 1]
                );
            }

            DB::commit();

            $msg = $id
                ? 'Produkt bol úspešne upravený.'
                : 'Produkt bol úspešne pridaný.';
            return back()->with('success', $msg);

        } catch (\Throwable $e) {
            DB::rollBack(); // ak sa nieco pokazilo, vsetky SQL prikazy sa vratia do povodneho stavu
            Log::error('Product save failed: ' . $e->getMessage());
            return back()
                ->withErrors('Nepodarilo sa uložiť produkt – skúste to znova.')
                ->withInput();
        }
    }

    // DELETE PRODUCT
    public function deleteProduct(Product $product) {
        DB::beginTransaction();
        try {
            // delete photos from storage
            foreach ($product->photos as $photo) {
                Storage::disk('public')->delete(
                    STR::after($photo->url, '/storage/') //relative path
                );
            }

            // cascade delete
            $product->photos()->delete();
            $product->sizes()->delete();

            // delete product
            $product->delete();

            DB::commit();
            return back()->with('success', 'Produkt bol úspešne odstránený.');
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Product delete failed: ' . $e->getMessage());
            return back()
                ->withErrors('Nepodarilo sa odstrániť produkt – skúste to znova.')
                ->withInput();
        }
    }
}
