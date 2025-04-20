<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('TRUNCATE TABLE products RESTART IDENTITY CASCADE');
        DB::table('products')->insert([
            [
                'name' => 'Bunda_1_Siva',
                'description' => 'Prechodna bunda..............',
                'price' => 19.99,
                'brand' => 'Znacka_1',
                'color' => 'Grey',
                'category_id' => null,       // predpokladáš, že kategórie už existujú
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nohavice_1',
                'description' => 'Nohavice hnede, 874....',
                'price' => 34.50,
                'brand' => 'Znacka_2',
                'color' => 'Brown',
                'category_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tricko_1',
                'description' => 'Tricko_3ks',
                'price' => 49.90,
                'brand' => 'Znacka_2',
                'color' => 'Blue',
                'category_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
