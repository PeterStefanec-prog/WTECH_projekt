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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();

            // Prepojenie na používateľa
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Prepojenie na produkt
            $table->foreignId('product_id')->constrained()->onDelete('cascade');

            // Množstvo a voliteľná veľkosť
            $table->integer('quantity')->default(1);
            $table->string('size')->nullable();

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
