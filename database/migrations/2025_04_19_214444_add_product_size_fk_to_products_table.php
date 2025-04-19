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
        Schema::table('products', function (Blueprint $table) {
            // pridáme FK na produktové veľkosti
            $table->foreign('product_size_id')
                ->references('id')
                ->on('product_sizes')
                ->cascadeOnDelete();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['product_size_id']);
        });
    }
};
