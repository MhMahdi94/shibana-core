<?php

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

Route::get('/customer', function (Request $request) {
    return 'Hello customer2';
});
Route::post('/register', 'App\Http\Controllers\API\Customer\CustomerController@customer_register');
Route::post('/login', 'App\Http\Controllers\API\Customer\CustomerController@customer_login');
Route::middleware('auth:sanctum')->group(function () {
    //home
    Route::get('/home/categories', 'App\Http\Controllers\API\Customer\HomeController@get_categories');
    Route::get('/home/resturants', 'App\Http\Controllers\API\Customer\HomeController@get_resturants');

    //resturant
    Route::get('/resturant/categories', 'App\Http\Controllers\API\Customer\ResturantController@get_categories');
    Route::get('/resturant/meals/{resturant_id}/{category_id}', 'App\Http\Controllers\API\Customer\ResturantController@get_meals');

    //wishlist
    Route::post('/wishlist/meals', 'App\Http\Controllers\API\Customer\WishlistController@add_meal_wishlist');
    Route::post('/wishlist/resturants', 'App\Http\Controllers\API\Customer\WishlistController@add_resturant_wishlist');
    Route::get('/wishlist/resturants', 'App\Http\Controllers\API\Customer\WishlistController@get_resturant_wishlist');
    Route::get('/wishlist/meals', 'App\Http\Controllers\API\Customer\WishlistController@get_meals_wishlist');

    //cart
    Route::get('/cart/list', 'App\Http\Controllers\API\Customer\CartController@get_cart');
    Route::post('/cart/add', 'App\Http\Controllers\API\Customer\CartController@add_to_cart');
    Route::get('/cart/remove/{id}', 'App\Http\Controllers\API\Customer\CartController@remove_from_cart');

    //order
    Route::post('/order/create', 'App\Http\Controllers\API\Customer\OrderController@save_order');
    Route::get('/order/list/running', 'App\Http\Controllers\API\Customer\OrderController@get_orders');
    Route::get('/order/list/history', 'App\Http\Controllers\API\Customer\OrderController@get_orders_history');

    //wallet
    Route::post('/wallet/create', 'App\Http\Controllers\API\Customer\WalletController@create_wallet');
    Route::get('/wallet/get', 'App\Http\Controllers\API\Customer\WalletController@get_wallet');
    Route::post('/wallet/topup', 'App\Http\Controllers\API\Customer\WalletController@top_wallet');
    Route::post('/wallet/transfer', 'App\Http\Controllers\API\Customer\WalletController@transfer_wallet');
    Route::get('/wallet/transactions', 'App\Http\Controllers\API\Customer\WalletController@get_wallet_transaction');
});
