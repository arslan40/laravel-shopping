<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AddcartController;

Route::get('view_product', 'ProductController@viewProduct');
Route::get('view_product/{url_key}', 'ProductController@viewSingleProduct');

Route::get('view_cart', 'AddcartController@viewCart')->name('viewCart');
Route::get('add-to-cart/{id}', 'AddcartController@getAddToCart')->name('getAddToCart');
Route::post('/ajax_call', 'AddcartController@AjaxCall');

Route::get('check_out', 'AddcartController@checkout');
Route::post('/store_checkout', 'AddcartController@store');

Route::get('order_done', 'AddcartController@done');

Route::get('delete_cart/{id}', 'AddcartController@deleteCart');

Route::get('view_category', 'CategoryController@viewCategory');

Route::get('view_home', 'HomeController@viewHome');


Route::get('/', function () {
    return view('welcome');
});
