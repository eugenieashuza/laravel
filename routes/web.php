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

// Cooperative RESTFUL APIS (CRU Operations)
Route::get('cooperatives', 'CooperativesController@index');
Route::get('cooperatives/create', 'CooperativesController@create');
Route::post('cooperatives', 'CooperativesController@storecooperatives');
Route::get('cooperatives/edit/{cooperative}', 'CooperativesController@edit');
Route::put('cooperatives/{cooperative}', 'CooperativesController@updatecooperatives');


// members RESTFUL APIS (CRU Operations)
Route::get('membres', 'MembresController@index');
Route::get('membres/create', 'MembresController@create');
Route::post('membres', 'MembresController@storemembres');
Route::get('membres/edit/{member}', 'MembresController@edit');
Route::put('membres/{member}', 'MembresController@updatemembres');


