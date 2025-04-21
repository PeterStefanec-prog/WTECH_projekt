<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSizeSeeder extends Seeder
{
    public function run(): void
    {

        DB::statement('TRUNCATE TABLE product_sizes RESTART IDENTITY CASCADE');

        $sizes = ['S', 'M', 'L', 'XL'];

        for ($productId = 1; $productId <= 300; $productId++) {
            foreach ($sizes as $size) {
                DB::table('product_sizes')->insert([
                    'product_id' => $productId,
                    'size'       => $size,
                    // random stock between 0 and 20
                    'stock'      => rand(0, 20),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }


//        // Uvolníme všetky záznamy a resetujeme ID (PostgreSQL)
//        DB::statement('TRUNCATE TABLE product_sizes RESTART IDENTITY CASCADE');
//
//        // Pripravíme si statické dáta - pre každý produkt rôzne veľkosti a stavy skladu
//        DB::table('product_sizes')->insert([
//            // Produkt 1
//            ['product_id' => 1, 'size' => 'S',  'stock' => 10, 'created_at' => now(), 'updated_at' => now()],
//            ['product_id' => 1, 'size' => 'M',  'stock' => 15, 'created_at' => now(), 'updated_at' => now()],
//            ['product_id' => 1, 'size' => 'L',  'stock' =>  7, 'created_at' => now(), 'updated_at' => now()],
//            ['product_id' => 1, 'size' => 'XL', 'stock' =>  3, 'created_at' => now(), 'updated_at' => now()],
//
//            // Produkt 2
//            ['product_id' => 2, 'size' => 'S',  'stock' =>  5, 'created_at' => now(), 'updated_at' => now()],
////            ['product_id' => 2, 'size' => 'M',  'stock' =>  8, 'created_at' => now(), 'updated_at' => now()],
//            ['product_id' => 2, 'size' => 'L',  'stock' =>  2, 'created_at' => now(), 'updated_at' => now()],
//            ['product_id' => 2, 'size' => 'XL', 'stock' =>  1, 'created_at' => now(), 'updated_at' => now()],
//
//            // Produkt 3
//            ['product_id' => 3, 'size' => 'S',  'stock' => 12, 'created_at' => now(), 'updated_at' => now()],
//            ['product_id' => 3, 'size' => 'M',  'stock' => 20, 'created_at' => now(), 'updated_at' => now()],
//            ['product_id' => 3, 'size' => 'L',  'stock' =>  6, 'created_at' => now(), 'updated_at' => now()],
//            ['product_id' => 3, 'size' => 'XL', 'stock' =>  0, 'created_at' => now(), 'updated_at' => now()],
//        ]);
    }
}
