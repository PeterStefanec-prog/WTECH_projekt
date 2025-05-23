<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductPhotoSeeder extends Seeder
{
    public function run(): void
    {
        // 1) clear existing tables
        DB::table('product_photos')->truncate();
        DB::table('product_sizes')->truncate();
        DB::table('products')->truncate();

        $baseDir    = public_path('images/products');
        $genders    = ['men','women','kids'];
        $categories = ['Clothes','Sport','Streetwear','Accessories','Sales'];
        $colors     = ['Red','Blue','Green','Black','White'];
        $sizes      = ['S','M','L','XL'];

        foreach ($genders as $g) {
            foreach ($categories as $c) {
                foreach ($colors as $col) {
                    $folder = "{$baseDir}/{$g}/{$c}";
                    if (! File::isDirectory($folder)) {
                        continue;
                    }

                    // 2) collect & sort all Color_*.jpg files
                    $files = collect(File::files($folder))
                        ->filter(fn($f) => Str::startsWith($f->getFilename(), "{$col}_"))
                        ->sortBy(fn($f) => intval(
                            explode('_', pathinfo($f->getFilename(), PATHINFO_FILENAME))[1]
                        ))
                        ->values();

                    // 3) break into chunks of 4
                    $chunks = $files->chunk(4);

                    foreach ($chunks as $chunk) {
                        // 4) create a product for this group of 4 images
                        $now = now();
                        $productId = DB::table('products')->insertGetId([
                            'name'         => "{$col} {$c} ".Str::random(5),
                            'description'  => "Auto‐seeded {$col} {$c} product",
                            'price'        => rand(1000,9999)/100,
                            'brand'        => 'AutoBrand',
                            'gender'       => $g,
                            'category'     => $c,
                            'color'        => $col,
                            'created_at'   => $now,
                            'updated_at'   => $now,
                        ]);

                        // 5) attach the 4 images
                        foreach ($chunk as $file) {
                            $filename = $file->getFilename();
                            $url = "/images/products/{$g}/{$c}/{$filename}";
                            DB::table('product_photos')->insert([
                                'product_id' => $productId,
                                'url'        => $url,
                                'created_at' => $now,
                                'updated_at' => $now,
                            ]);
                        }

                        // 6) seed sizes/stock
                        foreach ($sizes as $s) {
                            DB::table('product_sizes')->insert([
                                'product_id' => $productId,
                                'size'       => $s,
                                'stock'      => rand(0,20),
                                'created_at' => $now,
                                'updated_at' => $now,
                            ]);
                        }
                    }
                }
            }
        }
    }
}
