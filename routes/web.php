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
Route::get('acceuil', 'AcceuilController@index')->name('acceuil');

// Cooperative RESTFUL APIS (CRU Operations)
Route::get('cooperatives', 'CooperativesController@index');
Route::get('cooperatives/create', 'CooperativesController@create');
Route::post('cooperatives', 'CooperativesController@storecooperatives');
Route::get('cooperatives/edit/{cooperative}', 'CooperativesController@edit');
Route::put('cooperatives/{cooperative}', 'CooperativesController@updatecooperatives');
Route::get('cooperatives/{id}', 'CooperativesController@show');
Route::get('cooperatives/download/{id}', 'CooperativesController@download');
Route::get('cooperatives/search', 'CooperativesController@search')->name('cooperatives.search');


// members RESTFUL APIS (CRU Operations)
Route::get('membres', 'MembresController@index');
Route::get('membres/create', 'MembresController@create');
Route::post('membres', 'MembresController@storemembres');
Route::get('membres/edit/{membre}', 'MembresController@edit');
Route::put('membres/{membre}', 'MembresController@updatemembres');
Route::get('membres/search', 'MembresController@search')->name('membres.search');


// communes RESTFUL APIS (CRU Operations)
Route::get('communes', 'CommunesController@index');
Route::get('communes/create', 'CommunesController@create');
Route::post('communes', 'CommunesController@storecommunes');
Route::get('communes/edit/{commune}', 'CommunesController@edit');
Route::put('communes/{commune}', 'CommunesController@updatecommunes');
Route::get('communes/search', 'CommunesController@search')->name('communes.search');



// provinces RESTFUL APIS (CRU Operations)
Route::get('provinces', 'ProvincesController@index');
Route::get('provinces/create', 'ProvincesController@create');
Route::post('provinces', 'ProvincesController@storeprovinces');
Route::get('provinces/edit/{province}', 'ProvincesController@edit');
Route::put('provinces/{province}', 'ProvincesController@updateprovinces');
Route::get('provinces/search', 'ProvincesController@search')->name('provinces.search');


//cooperatives_membre  RESTFUL APIS (CRU Operations)
Route::get('cooperative_membres', 'Cooperative_membresController@index');
Route::get('cooperative_membres/create', 'Cooperative_membresController@create');
Route::post('cooperative_membres', 'Cooperative_membresController@storecooperative_membres');
Route::get('cooperative_membres/edit/{cooperative_membre}', 'Cooperative_membresController@edit');
Route::put('cooperative_membres/{cooperative_membre}', 'Cooperative_membresController@updatecooperative_membres');
Route::get('cooperative_membres/search', 'Cooperative_membresController@search')->name('Cooperative_membres.search');

//statistiques
Route::get('statistiques', 'StatistiquesController@index');
// Route::get('/test', 'function(){
//     return view('testview')});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
