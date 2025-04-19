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
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->text('description')->nullable();
            $table->decimal('price',10,2);
            $table->string('brand')->nullable();
            $table->string('color')->nullable();

            // tu pridame len stlpec – bez constraintu - tu som dal neskor - kvoli generovaniu migracii
            $table->unsignedBigInteger('product_size_id')->nullable();

            // FK na kategóriu a veľkosť
            $table->foreignId('category_id')
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
