<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PaymentMethodSeeder extends Seeder
{
    public function run()
    {
        // Vyčistíme tabuľku pred seedovaním
        DB::table('payment_methods')->truncate();

        $now = Carbon::now();

        DB::table('payment_methods')->insert([
            [
                'name'       => 'Platobná karta',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'Apple pay',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'       => 'Pay pall',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
