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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('layout.form');
});
Route::get('/test1', function () {
    return "HELLO";
});
Auth::routes();

Route::get('/clients/selectvillage', function () {
    return view('clients.selectvillage');
 })->name('clients.selectvillage');
 
 Route::get('/home', 'HomeController@index')->name('home');
 Route::get('/clients/list', 'ClientController@list')->name('clients.list');
 Route::get('/villages/list', 'VillageController@list')->name('villages.list');
 Route::resource('villages', 'VillageController');
 Route::resource('clients', 'ClientController');
 Route::get('/abonnements/list', 'AbonnementController@list')->name('abonnements.list');
 Route::resource('abonnements', 'AbonnementController');
 Route::get('/compteurs/list', 'CompteurController@list')->name('compteurs.list');
 Route::resource('compteurs', 'CompteurController');
 Route::get('/gestionnaires/list', 'GestionnaireController@list')->name('gestionnaires.list');
 Route::resource('gestionnaires', 'GestionnaireController');
 Route::get('/agents/list', 'AgentController@list')->name('agents.list');
 Route::resource('agents', 'AgentController');
 Route::get('/comptables/list', 'ComptableController@list')->name('comptables.list');
 Route::resource('comptables', 'ComptableController');