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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // order_id

            // FK na users.id
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();

            $table->date('order_date');          // datum objednavky
            $table->string('status');            // napr. "pending", "shipped"

            // FK na address_id
            $table->foreignId('address_id')
                ->constrained()
                ->cascadeOnDelete();

            // FK na payment_method_id
            $table->foreignId('payment_method_id')
                ->constrained()
                ->cascadeOnDelete();

            // FK na shipping_method_id
            $table->foreignId('shipping_method_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->decimal('total_price', 10, 2);  // celkova cena objednavky

            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
