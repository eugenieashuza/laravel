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
Route::get('uploadfile', 'CooperativesController@uploadfile')->name('uploadfile');
Route::post('uploadfile','CooperativesController@uploadFilePost')->name('post.uploadfile');


// members RESTFUL APIS (CRU Operations)
Route::get('membres', 'MembresController@index');
Route::get('membres/create', 'MembresController@create');
Route::post('membres', 'MembresController@storemembres');
Route::get('membres/edit/{membre}', 'MembresController@edit');
Route::put('membres/{membre}', 'MembresController@updatemembres');



// communes RESTFUL APIS (CRU Operations)
Route::get('communes', 'CommunesController@index');
Route::get('communes/create', 'CommunesController@create');
Route::post('communes', 'CommunesController@storecommunes');
Route::get('communes/edit/{commune}', 'CommunesController@edit');
Route::put('communes/{commune}', 'CommunesController@updatecommunes');



// provinces RESTFUL APIS (CRU Operations)
Route::get('provinces', 'ProvincesController@index');
Route::get('provinces/create', 'ProvincesController@create');
Route::post('provinces', 'ProvincesController@storeprovinces');
Route::get('provinces/edit/{member}', 'ProvincesController@edit');
Route::put('provinces/{member}', 'ProvincesController@updateprovinces');


