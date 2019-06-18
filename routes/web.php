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
 Route::get('/clients/list', 'ClientController@list')->name('clients.list');
 Route::resource('abonnements', 'AbonnementController');