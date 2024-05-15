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
        Schema::create('cart_models', function (Blueprint $table) {
            $table->id();
            $table->integer('meal_id');
            $table->integer('user_id')->default(0);
            $table->integer('resturant_id');
            $table->integer('quantity');
            $table->double('price');
            $table->integer('variation_id')->default(0);
            $table->integer('option_id')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_models');
    }
};
