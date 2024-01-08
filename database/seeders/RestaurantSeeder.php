<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //with config we take Restaurants file in config folder
        $restaurants = config('restaurants');

        foreach($restaurants as $restaurant){
            $new_restaurant = new Restaurant();
            $new_restaurant -> user_id = 1;
            $new_restaurant -> cover_image = $restaurant['cover_image'];
            $new_restaurant -> name = $restaurant['name'];
            $new_restaurant -> address = $restaurant['address'];
            $new_restaurant -> vat = $restaurant['vat'];
            $new_restaurant -> save();
        }
    }
}
