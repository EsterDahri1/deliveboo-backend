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
            // $table->foreign('restaurant_id')->references('id')->on('restaurant')->unique();

            $table->string('order_number');
            $table->string('costumer', 60);
            $table->string('email', 60);
            $table->string('costumerAddress', 60);
            $table->string('phoneNumber', 15)->nullable();
            $table->date('orderDate');
            $table->date('deliveryDate');
            $table->boolean('statusOrder');
            $table->string('totalPrice', 60);
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
