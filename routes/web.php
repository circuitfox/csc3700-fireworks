<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource("orders", "OrderController");

Route::resource("products", "ProductController");

Route::get("/password/admin", "Auth\ForceResetPasswordController@showForceResetForm")
    ->name("password.admin.reset");

Route::post("/password/admin", "Auth\ForceResetPasswordController@reset")
    ->name("password.admin.reset");
