<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductFromImagesSeeder extends Seeder
{
    public function run(): void
    {
        // 1) Clear out the tables
        DB::table('product_photos')->truncate();
        DB::table('product_sizes')->truncate();
        DB::table('products')->truncate();

        // 2) Your domain data
        $baseDir    = public_path('images/products');
        $genders    = ['men','women','kids'];
        $categories = ['Clothes','Sport','Streetwear','Accessories','Sales'];
        $colors     = ['Red','Blue','Green','Black','White'];
        $brands     = ['Nike','Adidas','Puma'];

        // create a simple counter
        $itemNumber = 1;

        // 3) Iterate every combination
        foreach ($genders as $g) {
            foreach ($categories as $c) {
                foreach ($colors as $col) {
                    $folder = "{$baseDir}/{$g}/{$c}";
                    if (! File::isDirectory($folder)) {
                        continue;
                    }

                    // 4) Grab, filter & sort all Color_*.jpg files
                    $files = collect(File::files($folder))
                        ->filter(fn($f) => Str::startsWith($f->getFilename(), "{$col}_"))
                        ->sortBy(fn($f) => intval(
                            explode('_', pathinfo($f->getFilename(), PATHINFO_FILENAME))[1]
                        ))
                        ->values();

                    // 5) Break into groups of 4
                    $chunks = $files->chunk(4);

                    foreach ($chunks as $chunk) {
                        // 6) Create one product per 4-image chunk
                        $now   = now();
                        $brand = $brands[array_rand($brands)];
                        $name  = "{$c} {$col} Item {$itemNumber} - {$brand}";

                        $productId = DB::table('products')->insertGetId([
                            'name'         => $name,
                            'description'  => "Auto-seeded {$c} {$col} product",
                            'price'        => rand(1000,9999) / 100,
                            'brand'        => $brand,
                            'gender'       => $g,
                            'category'     => $c,
                            'color'        => $col,
                            'category_id'  => null,
                            'created_at'   => $now,
                            'updated_at'   => $now,
                        ]);

                        // 7) Attach exactly these 4 images
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

                        // 8) Seed sizes with random stock
                        foreach (['S','M','L','XL'] as $size) {
                            DB::table('product_sizes')->insert([
                                'product_id' => $productId,
                                'size'       => $size,
                                'stock'      => rand(0,20),
                                'created_at' => $now,
                                'updated_at' => $now,
                            ]);
                        }

                        // increment for next product
                        $itemNumber++;
                    }
                }
            }
        }
    }
}
