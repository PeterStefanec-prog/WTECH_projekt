<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductPhotoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('product_photos')->truncate();
        DB::table('product_photos')->insert([
            [
                'product_id' => 1,
                'url' => 'https://img01.ztat.net/article/spp-media-p1/5d977c9686b54d68adbe9e1f0f478b9e/3d6479094e0942f6878d28fef801574c.jpg?imwidth=1800&filter=packshot',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 2,
                'url' => 'https://img01.ztat.net/article/spp-media-p1/ff5846f09069465098e53706f40b809e/513acb7aa9ad4b77b39907db7e190230.jpg?imwidth=1800',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 2,
                'url' => 'https://img01.ztat.net/article/spp-media-p1/d34bf2ee38ae470c8ca26b88349ea7c0/f4661271df5d4a92a91c5aaf6628f8ae.jpg?imwidth=1800',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 2,
                'url' => 'https://img01.ztat.net/article/spp-media-p1/1e7e9e53c6b845529459acc00458e230/93299fbd8fcf4f0da327c82503d635d9.jpg?imwidth=1800',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 3,
                'url' => 'https://img01.ztat.net/article/spp-media-p1/f6eab10572804c67b94c5f149fef39ee/50ecaf3a25ac4deaad0269270ecda5e1.jpg?imwidth=1800&filter=packshot',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

