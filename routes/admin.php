<?php

use App\Http\Controllers\Admin\AddonsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CuisineController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MealController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\RestaurantsController;
use App\Http\Controllers\Admin\WalletController;
use App\Http\Controllers\Admin\WalletTransactionsController;
use Illuminate\Support\Facades\Route;

Route::group([
    "namespace" => "Admin",
    'prefix' => 'admin' ,//. LaravelLocalization::setLocale() . '/admin',
    'as' => 'admin.',
    'middleware' => ['admin',/*'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'*/]
], function () {
    Route::get('/', function () {
          return view('welcome');
      });
    //auth
    Route::get('/login', [AuthController::class, 'show_login_view'])->name('show_login');
    Route::post('/login', [AuthController::class, 'login'])->name('admin.login');
    // Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');

    //home
    Route::group(['prefix' => '/home',
    'as' => 'home.',],function ()  {
      Route::get('/',[HomeController::class, 'index'])->name('home');
    });

    //admins
    Route::group(['prefix' => '/admins',
    'as' => 'admins.',],function ()  {
      Route::get('/',[AdminController::class, 'index'])->name('admins_index');
      Route::post('/search',[AdminController::class, 'search'])->name('admins_search');
      Route::get('/create',[AdminController::class, 'create'])->name('admins_create');
      Route::post('/store',[AdminController::class, 'store'])->name('admins_store');
      Route::get('/edit/{id}',[AdminController::class, 'edit'])->name('admins_edit');
      Route::put('/update/{id}',[AdminController::class, 'update'])->name('admins_update');
      Route::delete('/delete/{id}',[AdminController::class, 'destroy'])->name('admins_destroy');
      Route::post('/update-status',[AdminController::class, 'status'])->name('admins_status');
    });

    //cuisines
    Route::group(['prefix' => '/cuisines',
    'as' => 'cuisines.',],function ()  {
      Route::get('/',[CuisineController::class, 'index'])->name('cuisines_index');
      Route::post('/search',[CuisineController::class, 'search'])->name('cuisines_search');
      Route::get('/create',[CuisineController::class, 'create'])->name('cuisines_create');
      Route::post('/store',[CuisineController::class, 'store'])->name('cuisines_store');
      Route::get('/edit/{id}',[CuisineController::class, 'edit'])->name('cuisines_edit');
      Route::put('/update/{id}',[CuisineController::class, 'update'])->name('cuisines_update');
      Route::delete('/delete/{id}',[CuisineController::class, 'destroy'])->name('cuisines_destroy');
      Route::post('/update-status',[CuisineController::class, 'status'])->name('cuisines_status');
    });

    
    //resturants
    Route::group(['prefix' => '/resturants',
    'as' => 'resturants.',],function ()  {
      Route::get('/',[RestaurantsController::class, 'index'])->name('resturants_index');
      Route::post('/search',[RestaurantsController::class, 'search'])->name('resturants_search');
      Route::get('/create',[RestaurantsController::class, 'create'])->name('resturants_create');
      Route::post('/store',[RestaurantsController::class, 'store'])->name('resturants_store');
      Route::get('/edit/{id}',[RestaurantsController::class, 'edit'])->name('resturants_edit');
      Route::put('/update/{id}',[RestaurantsController::class, 'update'])->name('resturants_update');
      Route::delete('/delete/{id}',[RestaurantsController::class, 'destroy'])->name('resturants_destroy');
      Route::post('/update-status',[RestaurantsController::class, 'status'])->name('resturants_status');
    });

      //categories
      Route::group(['prefix' => '/categories',
      'as' => 'categories.',],function ()  {
        Route::get('/',[CategoryController::class, 'index'])->name('categories_index');
        Route::post('/search',[CategoryController::class, 'search'])->name('categories_search');
        Route::get('/create',[CategoryController::class, 'create'])->name('categories_create');
        Route::post('/store',[CategoryController::class, 'store'])->name('categories_store');
        Route::get('/edit/{id}',[CategoryController::class, 'edit'])->name('categories_edit');
        Route::put('/update/{id}',[CategoryController::class, 'update'])->name('categories_update');
        Route::delete('/delete/{id}',[CategoryController::class, 'destroy'])->name('categories_destroy');
        Route::post('/update-status',[CategoryController::class, 'status'])->name('categories_status');
      });

      //addon
      Route::group(['prefix' => '/addons',
      'as' => 'addons.',],function ()  {
        Route::get('/',[AddonsController::class, 'index'])->name('addons_index');
        Route::post('/search',[AddonsController::class, 'search'])->name('addons_search');
        Route::get('/create',[AddonsController::class, 'create'])->name('addons_create');
        Route::post('/store',[AddonsController::class, 'store'])->name('addons_store');
        Route::get('/edit/{id}',[AddonsController::class, 'edit'])->name('addons_edit');
        Route::put('/update/{id}',[AddonsController::class, 'update'])->name('addons_update');
        Route::delete('/delete/{id}',[AddonsController::class, 'destroy'])->name('addons_destroy');
        Route::post('/update-status',[AddonsController::class, 'status'])->name('addons_status');
      });

      //meals
      Route::group(['prefix' => '/meals',
      'as' => 'meals.',],function ()  {
        Route::get('/',[MealController::class, 'index'])->name('meals_index');
        Route::post('/search',[MealController::class, 'search'])->name('meals_search');
        Route::get('/create',[MealController::class, 'create'])->name('meals_create');
        Route::post('/store',[MealController::class, 'store'])->name('meals_store');
        Route::get('/edit/{id}',[MealController::class, 'edit'])->name('meals_edit');
        Route::put('/update/{id}',[MealController::class, 'update'])->name('meals_update');
        Route::delete('/delete/{id}',[MealController::class, 'destroy'])->name('meals_destroy');
        Route::post('/update-status',[MealController::class, 'status'])->name('meals_status');
      });
      //meals
      Route::group(['prefix' => '/orders',
      'as' => 'orders.',],function ()  {
        Route::get('/',[OrderController::class, 'index'])->name('orders_index');
        Route::post('/search',[OrderController::class, 'search'])->name('orders_search');
        Route::get('/create',[OrderController::class, 'create'])->name('orders_create');
        Route::post('/store',[OrderController::class, 'store'])->name('orders_store');
        Route::get('/edit/{id}',[OrderController::class, 'edit'])->name('orders_edit');
        Route::put('/update/{id}',[OrderController::class, 'update'])->name('orders_update');
        Route::delete('/delete/{id}',[OrderController::class, 'destroy'])->name('orders_destroy');
        Route::post('/update-status',[OrderController::class, 'status'])->name('orders_status');
      });

      //wallet
      Route::group(['prefix' => '/wallet',
      'as' => 'wallet.',],function ()  {
        Route::get('/',[WalletController::class, 'index'])->name('wallet_index');
        Route::post('/search',[WalletController::class, 'search'])->name('wallet_search');
        Route::get('/create',[WalletController::class, 'create'])->name('wallet_create');
        Route::post('/store',[WalletController::class, 'store'])->name('wallet_store');
        Route::get('/edit/{id}',[WalletController::class, 'edit'])->name('wallet_edit');
        Route::put('/update/{id}',[WalletController::class, 'update'])->name('wallet_update');
        Route::delete('/delete/{id}',[WalletController::class, 'destroy'])->name('wallet_destroy');
        Route::post('/update-status',[WalletController::class, 'status'])->name('wallet_status');
      });

      //wallet transactions
      Route::group(['prefix' => '/wallet_transactions',
      'as' => 'wallet_transactions.',],function ()  {
        Route::get('/',[WalletTransactionsController::class, 'index'])->name('wallet_transactions_index');
        Route::post('/search',[WalletTransactionsController::class, 'search'])->name('wallet_transactions_search');
        Route::get('/create',[WalletTransactionsController::class, 'create'])->name('wallet_transactions_create');
        Route::post('/store',[WalletTransactionsController::class, 'store'])->name('wallet_transactions_store');
        Route::get('/edit/{id}',[WalletTransactionsController::class, 'edit'])->name('wallet_transactions_edit');
        Route::put('/update/{id}',[WalletTransactionsController::class, 'update'])->name('wallet_transactions_update');
        Route::delete('/delete/{id}',[WalletTransactionsController::class, 'destroy'])->name('wallet_transactions_destroy');
        Route::post('/update-status',[WalletTransactionsController::class, 'status'])->name('wallet_transactions_status');
      });
});
