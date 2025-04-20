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
        Schema::create('products', function (Blueprint $table) {
            $table->id();                       // PK product_id
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price',10,2);
            $table->string('brand')->nullable();
            $table->enum('gender', ['men', 'women', 'kids'])->nullable();
            $table->enum('category', ['Clothes', 'Sport', 'Streetwear', 'Accessories', 'Sale'])->nullable();
            $table->string('color')->nullable();


            // FK na kategóriu a veľkosť
            $table->foreignId('category_id')
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();

//            $table->foreignId('product_size_id')
//                ->constrained()
//                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
