<?php

use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\RestaurantController;
use App\Models\Product;
use App\Models\Restaurant;
use App\Models\Typology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('restaurants', function(){
    // $restaurants =  Restaurant::all();

    // foreach ($restaurants as $restaurant) {

    //     $products = $restaurant->products;

    // }
    return response()->json([
        'success' => true,
        'result' => Restaurant::with(['typologies', 'products'])->orderBy('id')->paginate(10)
    ]);
});

Route::get('typologies', function(){
    // $restaurants =  Restaurant::all();

    // foreach ($restaurants as $restaurant) {

    //     $products = $restaurant->products;

    // }
    return response()->json([
        'success' => true,
        'result' => Typology::all(),
    ]);
});

Route::get('restaurant/{restaurant:id}', [RestaurantController::class, 'show']);

// Route::get('restaurants', function(){
//     return response()->json([
//         'success' => true,
//         'result' => Product::all(),
//     ]);
// });

Route::post('orders', [PaymentController::class, 'makePayment']);

Route::get('orders', [PaymentController::class, 'generate']);

Route::post('payment', [OrderController::class, 'store']);
