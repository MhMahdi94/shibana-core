<?php

use Illuminate\Routing\Route;

Route::group([
    "namespace" => "Resturaunt",
    //'prefix' => '/' . LaravelLocalization::setLocale() . '/resturaunt',
    'as' => 'resturaunt.',
    'middleware' => ['resturaunt',/*'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'*/]
], function () {
    // Route::get('/', function () {
    //       return view('welcome');
    //   });
    //auth
    // Route::get('/login', [LoginController::class, 'show_login_view'])->name('admin.show_login');
    // Route::post('login', [LoginController::class, 'login'])->name('admin.login');
    // Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');
});
