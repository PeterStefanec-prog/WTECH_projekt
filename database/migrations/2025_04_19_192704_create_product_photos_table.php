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
        Schema::create('product_photos', function (Blueprint $table) {
            $table->id(); // PK: photo_id

            // FK na product_id
            $table->foreignId('product_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('url'); // odkaz na obrázok (napr. 'images/bunda_1.jpg')

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_photos');
    }
};
