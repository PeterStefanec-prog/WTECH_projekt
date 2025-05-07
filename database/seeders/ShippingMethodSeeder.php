<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ShippingMethodSeeder extends Seeder
{
    public function run()
    {
        // Pred seedovaním vyčistíme tabuľku:
        DB::table('shipping_methods')->truncate();

        $now = Carbon::now();

        DB::table('shipping_methods')->insert([
            [
                'name'          => 'Packeta kuriér',
                'cost'          => 5.99,
                'shipping_time' => '3-5 Pracovných dní',
                'created_at'    => $now,
                'updated_at'    => $now,
            ],
            [
                'name'          => 'Slovenská pošta kuriér',
                'cost'          => 4.50,
                'shipping_time' => '4-5 Pracovných dní',
                'created_at'    => $now,
                'updated_at'    => $now,
            ],
        ]);
    }
}
