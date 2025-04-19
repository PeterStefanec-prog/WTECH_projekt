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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id(); // PK: order_item_id

            // FK na order_id
            $table->foreignId('order_id')
                ->constrained()
                ->cascadeOnDelete();

            // FK na product_id
            $table->foreignId('product_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->integer('quantity');
            $table->decimal('price', 10, 2); // jednotková cena

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
