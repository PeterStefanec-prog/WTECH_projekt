<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductSizeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('product_sizes')->truncate();

        foreach (Product::all() as $product) {
            foreach (['S','M','L','XL'] as $size) {
                DB::table('product_sizes')->insert([
                    'product_id' => $product->id,
                    'size'       => $size,
                    'stock'      => rand(0,20), // alebo 0 ak chceš prázdne sklady
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
