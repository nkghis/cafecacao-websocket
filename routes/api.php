<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/*
|--------------------------------------------------------------------------
| API Routes for not token acces
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/auth', 'PisteurController@auth')->name('pisteurs.auth');
Route::resource('pisteurs','PisteurController');
Route::resource('producteurs','ProducteurController');
Route::resource('cooperatives','CooperativeController');
Route::resource('ventes','VenteController');
Route::resource('produits','ProduitController');

/*Route::group(['middleware' => ['auth:api']],function (){

    Route::get('/auth', 'PisteurController@auth')->name('pisteurs.auth');
    Route::resource('pisteurs','PisteurController');
    Route::resource('producteurs','ProducteurController');
    Route::resource('cooperative','CooperativeController');
    Route::resource('ventes','VenteController');
    Route::resource('produits','ProduitController');
});*/
