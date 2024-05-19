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
            $table->integer('user_id');
            $table->integer('resturant_id');
            $table->string('address');
            $table->string('delivery_date');
            $table->string('delivery_time');
            $table->string('delivery_notes');
            $table->string('price');
            $table->string('vat');
            $table->string('delivery');
            $table->string('total_price');
            $table->integer('payment_status')->default(0);
            $table->integer('order_status')->default(0);
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
