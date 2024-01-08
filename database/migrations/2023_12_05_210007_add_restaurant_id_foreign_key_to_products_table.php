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
        Schema::table("products", function (Blueprint $table) {
            $table -> unsignedBigInteger("restaurant_id")->default(null)->after("id");
            $table -> foreign("restaurant_id")->references("id")->on("restaurants");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("products", function (Blueprint $table) {
            $table->dropForeign("products_restaurant_id_foreign");
            $table->dropColumn("restaurant_id");
        });
    }
};
