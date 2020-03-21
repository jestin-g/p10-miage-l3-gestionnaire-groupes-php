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
 * Routes pour la recherche d'individus dynamique
 * 
 */
Route::get('/search','IndividuController@search');
Route::get('/search/searchAjax','IndividuController@searchAjax');