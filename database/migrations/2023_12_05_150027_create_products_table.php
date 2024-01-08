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
            $table->id();
            // $table->foreign('restaurant_id')->references('id')->on('restaurant')->unique();
            // $table->foreign('restaurant_name')->references('name')->on('restaurant')->unique();
            $table->string('name', 60);
            $table->float('price', 4, 2);
            $table->text('description')->nullable();
            $table->longText('cover_image')->nullable();
            $table->text('ingredients');
            $table->boolean('is_available')->default(true);
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
