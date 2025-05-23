<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
//            ProductSeeder::class,
//            ProductPhotoSeeder::class,
//            ProductSizeSeeder::class,
            ProductFromImagesSeeder::class,
            ShippingMethodSeeder::class,
            PaymentMethodSeeder::class
        ]);

    }
}
