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
            $table->id();
            $table->string('user_id');
            $table->string('item_id');
            $table->string('name');
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('calculated_column')->storedAs('quantity * price');
            $table->string('phone_number')->nullable(); // Making phone_number nullable
            $table->string('county')->nullable(); // Making shipping_address nullable
            $table->string('estate')->nullable(); // Making shipping_address nullable
            $table->string('road')->nullable(); // Making shipping_address nullable
            $table->string('status')->default('pending'); // Making shipping_address nullable


            $table->timestamps();
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
