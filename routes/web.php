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
Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::get('/manage', 'AdminController@index')->middleware('admin');

Route::get('/manage/users', 'AdminController@users');
Route::get('/manage/products', 'AdminController@products');
Route::get('/manage/buys', 'AdminController@buys');

Route::get('/manage/users/create', 'AdminUserController@create');
Route::post('/manage/users/create', 'AdminUserController@store');
Route::get('/manage/users/{user}', function () {
    return redirect('/manage/users');
});
Route::get('/manage/users/{user}/edit', 'AdminUserController@edit');
Route::patch('/manage/users/{user}', 'AdminUserController@update');
Route::delete('/manage/users/{user}', 'AdminUserController@delete');

Route::get('/manage/products/create', 'AdminProductController@create');
Route::post('/manage/products/create', 'AdminProductController@store');
Route::get('/manage/products/{product}', function () {
    return redirect('/manage/products');
});
Route::get('/manage/products/{product}/edit', 'AdminProductController@edit');
Route::patch('/manage/products/{product}', 'AdminProductController@update');
Route::delete('/manage/products/{product}', 'AdminProductController@delete');

Route::get('/manage/buys/create', 'AdminBuyController@create');
Route::post('/manage/buys/create', 'AdminBuyController@store');
Route::get('/manage/buys/{buy}', function () {
    return redirect('/manage/buys');
});
Route::get('/manage/buys/{buy}/edit', 'AdminBuyController@edit');
Route::patch('/manage/buys/{buy}', 'AdminBuyController@update');
Route::delete('/manage/buys/{buy}', 'AdminBuyController@delete');

Route::get('/user/edit','UserController@edit');
Route::patch('/user','UserController@update');
Route::get('/history','UserController@history');
Route::get('/shop','UserController@shop');
Route::get('/cart','UserController@cart');
Route::get('/addToCart/{product}','UserController@showCartForm');
Route::post('/addToCart','UserController@addToCart');
Route::delete('/cart/delete/{buy}','UserController@deleteFromCart');
Route::get('/cart/{buy}/edit','UserController@showEditCartForm');
Route::patch('/cart/{buy}/edit','UserController@editCartItem');
Route::patch('/cart/pay','UserController@pay');
