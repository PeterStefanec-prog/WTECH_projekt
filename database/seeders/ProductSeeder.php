<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{

    public function run(): void
    {

        $categories = ['Clothes', 'Sport', 'Streetwear'];
        $genders = ['men', 'women', 'kids'];
        $colors = ['Red', 'Blue', 'Green', 'Black', 'White'];
        $brands = ['Nike', 'Adidas', 'Puma'];

        for ($i = 1; $i <= 30; $i++) {
            $cat    = $categories[($i - 1) % count($categories)];
            $gend   = $genders[($i - 1) % count($genders)];
            $color  = $colors[array_rand($colors)];
            $brand  = $brands[array_rand($brands)];
            $price  = rand(1000, 9999) / 100; // between 10.00 and 99.99

            DB::table('products')->insert([
                'name'           => ucfirst($cat) . " Item {$i}",
                'description'    => "Sample {$cat} item #{$i} for {$gend}",
                'price'          => $price,
                'brand'          => $brand,
                'gender'         => $gend,
                'category'       => $cat,
                'color'          => $color,
                'category_id'    => null,
                'created_at'     => now(),
                'updated_at'     => now(),
            ]);
        }


//            DB::statement('TRUNCATE TABLE products RESTART IDENTITY CASCADE');
//            DB::table('products')->insert([
//                [
//                    'name' => 'Bunda_1_Siva',
//                    'description' => 'Prechodna bunda..............',
//                    'price' => 19.99,
//                    'brand' => 'Znacka_1',
//                    'gender' => 'men',
//                    'category' => 'Clothes',
//                    'color' => 'Grey',
//                    'category_id' => null,       // predpokladáš, že kategórie už existujú
//                    'created_at' => now(),
//                    'updated_at' => now(),
//                ],
//                [
//                    'name' => 'Nohavice_1',
//                    'description' => 'Nohavice hnede, 874....',
//                    'price' => 34.50,
//                    'brand' => 'Znacka_2',
//                    'gender' => 'men',
//                    'category' => 'Clothes',
//                    'color' => 'Brown',
//                    'category_id' => null,
//                    'created_at' => now(),
//                    'updated_at' => now(),
//                ],
//                [
//                    'name' => 'Tricko_1',
//                    'description' => 'Tricko_3ks',
//                    'price' => 49.90,
//                    'brand' => 'Znacka_2',
//                    'gender' => 'men',
//                    'category' => 'Clothes',
//                    'color' => 'Blue',
//                    'category_id' => null,
//                    'created_at' => now(),
//                    'updated_at' => now(),
//                ],
//            ]);
    }
}
