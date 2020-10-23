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
Route::get('acceuil', 'AcceuilsController@index')->name('acceuil');

// Cooperative RESTFUL APIS (CRU Operations)
Route::get('cooperatives', 'CooperativesController@index');
Route::get('cooperatives/create', 'CooperativesController@create');
Route::post('cooperatives', 'CooperativesController@storecooperatives');
Route::get('cooperatives/edit/{cooperative}', 'CooperativesController@edit');
Route::put('cooperatives/{cooperative}', 'CooperativesController@updatecooperatives');
//for showing status
Route::get('cooperatives/{id}', 'CooperativesController@show');
//for download status
Route::get('cooperatives/download/{id}', 'CooperativesController@download');
//for search
Route::get('/cooperatives/recherche/search', 'CooperativesController@search')->name('cooperatives.search');
//for generete pdf
Route::get('/cooperatives/recherche/pdf','CooperativesController@createPDF');

// members RESTFUL APIS (CRU Operations)
Route::get('membres', 'MembresController@index');
Route::get('membres/create', 'MembresController@create');
Route::post('membres', 'MembresController@storemembres');
Route::get('membres/edit/{membre}', 'MembresController@edit');
Route::put('membres/{membre}', 'MembresController@updatemembres');
//for search
Route::get('membres/search', 'MembresController@search')->name('membres.search');
//for generete pdf
Route::get('/membres/pdf','MembresController@createPDF');


// communes RESTFUL APIS (CRU Operations)
Route::get('communes', 'CommunesController@index');
Route::get('communes/create', 'CommunesController@create');
Route::post('communes', 'CommunesController@storecommunes');
Route::get('communes/edit/{commune}', 'CommunesController@edit');
Route::put('communes/{commune}', 'CommunesController@updatecommunes');
Route::post('communes/destroycommune/{commune}', 'CommunesController@destroycommune');
//for search
Route::get('communes/search', 'CommunesController@search')->name('communes.search');
//for generete pdf
Route::get('/communes/pdf','CommunesController@createPDF');



// provinces RESTFUL APIS (CRU Operations)
Route::get('provinces', 'ProvincesController@index');
Route::get('provinces/create', 'ProvincesController@create');
Route::post('provinces', 'ProvincesController@storeprovinces');
Route::get('provinces/edit/{province}', 'ProvincesController@edit');
Route::put('provinces/{province}', 'ProvincesController@updateprovinces');
//for search
Route::get('provinces/search', 'ProvincesController@search')->name('provinces.search');
//for generete pdf
Route::get('/provinces/pdf','ProvincesController@createPDF');

//cooperatives_membre  RESTFUL APIS (CRU Operations)
Route::get('cooperative_membres', 'Cooperative_membresController@index');
Route::get('cooperative_membres/create', 'Cooperative_membresController@create');
Route::post('cooperative_membres', 'Cooperative_membresController@storecooperative_membres');
Route::get('cooperative_membres/edit/{cooperative_membre}', 'Cooperative_membresController@edit');
Route::put('cooperative_membres/{cooperative_membre}', 'Cooperative_membresController@updatecooperative_membres');

//for search
Route::get('cooperative_membres/search', 'Cooperative_membresController@search')->name('Cooperative_membres.search');
//for generete pdf
Route::get('/cooperative_membres/pdf','Cooperative_membresController@createPDF');


//profils
Route::get('profils', 'ProfilsController@index');
//statistiques
Route::get('statistiques', 'StatistiquesController@index');
Route::get('/chart','StatistiquesController@chart');
// Route::get('/test', 'function(){
//     return view('testview')});
Route::get('profils/create','ProfilsController@create');
Route::post('profils','ProfilsController@store');

///emails
// Route::get('/test-contact', function () {
//     return new App\Mail\Contact([
//       'nom' => 'Durand',
//       'email' => 'durand@chezlui.com',
//       'message' => 'Je voulais vous dire que votre site est magnifique !'
//       ]);
// });

Route::get("message", "ContactController@formMessageGoogle");
Route::post("message", "ContactController@sendMessageGoogle")->name('send.message.google');


















Auth::routes();
 Auth::routes(['register' => True]);
// Auth::routes(['verify' => true]);
// Route::get('profile', function () {
//     // Seuls les utilisateurs vérifiés peuvent entrer ...
// })->middleware('verified');
// Auth::routes(['reset' => false]);
// Auth::routes([
//     'register' => false,
//     'verify' => true,
//     'reset' => false
//   ]);

Route::get('/home', 'HomeController@index')->name('home');
