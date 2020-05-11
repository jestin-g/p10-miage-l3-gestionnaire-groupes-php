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

Route::get('/', function () {
    return view('welcome');
});

/**
 * Routes pour gérer les différentes ressources (store, index, create, show, create, destroy, edit)
 * 
 */
Route::resource('individus', 'IndividuController');
Route::resource('groups', 'GroupController');
Route::resource('appartenances', 'AppartenanceController');

/**
 * Route personalisée pour afficher un group (J'ai besoin de l'année demandée en plus de l'id)
 * 
 */
Route::get('groups/{id}/{annee}', 'GroupController@show')->name('groups.show2');

/**
 * Routes pour les exportations / importations de fichiers csv
 * 
 */
Route::get('fichier/export_xls', 'FichierController@export_all_xls');
Route::get('fichier/export_csv', 'FichierController@export_all_csv');
Route::get('export', 'GroupController@export')->name('export');
Route::get('export/xls', 'GroupController@export_group')->name('export_xls');


/**
 * Routes pour la recherche dynamique d'individus
 * 
 */
Route::get('/search','IndividuController@search');
Route::get('/search/searchAjax','IndividuController@searchAjax');

/**
  * API Routes
  *
  */
Route::group(['prefix' => 'api'], function () {
    Route::get('/', function() {
        return view('api.index');
    });
    Route::get('individu', 'IndividuController@showAll');
    Route::get('individu/{id}', 'IndividuController@showOne');
    Route::get('group/{id}/{annee}', 'GroupController@showOne');
});