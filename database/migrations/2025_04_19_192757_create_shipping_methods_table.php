<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shipping_methods', function (Blueprint $table) {
            $table->id(); // PK shipping_method_id
            $table->string('name', 50);       // napr. "Kuriér", "Osobný odber"
            $table->decimal('cost', 10, 2); // cena dopravy (napr. 3.99)
            $table->string('shipping_time', 50); // nový stĺpec na čas doručenia, napr. "3-5 Pracovné dni"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_methods');
    }
};
