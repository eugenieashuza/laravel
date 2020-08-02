<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@index');

// C RESTFUL APIS (CRUD Operations)
Route::get('categories', 'CategoriesController@index');
Route::get('categories/create', 'CategoriesController@create');
Route::post('categories', 'CategoriesController@store');
Route::get('categories/edit/{category}', 'CategoriesController@edit');
Route::put('categories/{category}', 'CategoriesController@update');
Route::post('categories/destroy/{category}', 'CategoriesController@destroy');

// Products RESTFUL APIS (CRUD Operations)
Route::get('products', 'ProductsController@index');
Route::get('products/create', 'ProductsController@create');
Route::post('products', 'ProductsController@store');
Route::get('products/edit/{product}', 'ProductsController@edit');
Route::put('products/{product}', 'ProductsController@update');
Route::post('products/destroy/{product}', 'ProductsController@destroy');
