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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();

            // FK to users.id, nullable for guest checkout
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            // Customer name fields
            $table->string('first_name', 50);
            $table->string('last_name', 50);

            // Address fields
            $table->string('street', 100);
            $table->string('city', 50);
            $table->string('postal_code', 20);
            $table->string('country', 50);

            // Additional notes (optional)
            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
