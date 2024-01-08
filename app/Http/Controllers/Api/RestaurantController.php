<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;



class RestaurantController extends Controller
{
   

    public function show($id)
{

    // creo una nuova istanza di project, gli passo i modelli type e technologies e prendo l id per vedere il singolo post

    $restaurant = Restaurant::with('typologies', 'products')->where('id', $id)->first();

    // se il progetto esiste faccio vedere il progetto

    if ($restaurant) {
        return response()->json([
            'success' => true,
            'result' => $restaurant
        ]);

    } 
    
    // senò errore 
    
    else {
        return response()->json([
            'success' => false,
            'result' => 'Ops! Page not found'
        ]);
    }
}


}

