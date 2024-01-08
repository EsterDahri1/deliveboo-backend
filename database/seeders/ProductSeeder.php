<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // config andiamo a prendere il file products nella cartella config
        $products = config('products');

        foreach ($products as $product) {
            $new_product = new Product();
            $new_product->name = $product['name'];
            $new_product->price = $product['price'];
            $new_product->restaurant_id = $product['restaurant_id'];
            $new_product->description = $product['description'];
            $new_product->cover_image = $product['cover_image'];
            $new_product->ingredients = implode(', ', $product['ingredients']);

            $new_product->name = $product['name'];
            $new_product->is_available = $product['is_available'];
            $new_product->save();
        }
    }
}
