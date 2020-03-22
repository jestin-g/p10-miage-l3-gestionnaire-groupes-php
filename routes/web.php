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
 * Route pour personalisé pour afficher un group (J'ai besoin de l'année demandée en plus de l'id)
 * 
 */
Route::get('groups/{id}/{annee}', 'GroupController@show')->name('groups.show2');

/**
 * Routes pour les exportations / importations de fichiers csv
 * 
 */
Route::get('fichier/import', 'FichierController@index');

/**
 * Routes pour la recherche d'individus dynamique
 * 
 */
Route::get('/search','IndividuController@search');
Route::get('/search/searchAjax','IndividuController@searchAjax');