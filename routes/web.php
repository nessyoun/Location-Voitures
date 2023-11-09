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


//voiture routes
Route::get('/voitures/consulter','VoitureController@index')->name('voitures.consulter')->middleware('comercial');
Route::get('/consulter/{id}','VoitureController@show')->middleware('comercial');
Route::get('/deleteVoiture/{id}','VoitureController@destroy')->middleware('comercial');
Route::get('/voitures/ajouter','VoitureController@create')->middleware('comercial');
Route::post('/ajouterVoiture','VoitureController@ajouter')->middleware('comercial');
Route::post('/editVoiture','VoitureController@edit')->middleware('comercial');
Route::get('/rechercher','VoitureController@find')->middleware('comercial');
Route::get('/rechercher','VoitureController@findForclient');
Route::get('/showDetails/{id}','VoitureController@showDetails');

//userroutes
Route::get('/users','ClientController@index')->middleware('admin');;
Route::post('/newUser','ClientController@create')->middleware('admin');;
Route::get('/deleteUser/{id}','ClientController@destroy')->middleware('admin');;
Route::get('/restorePassword/{id}','ClientController@update')->middleware('admin');;
Route::get('/showUser/{id}','ClientController@show')->middleware('admin');;
Route::post('/UpdateUser','ClientController@edit')->middleware('admin');;
Route::get('/profile','ClientController@profile')->middleware('comercial');
Route::get('/clients','ClientController@clientsShow')->middleware('comercial');
Route::get('/deleteClient/{id}','ClientController@clientsDelete')->middleware('comercial');

//statsroutes
Route::get('/stats','StatsController@index')->middleware('admin');
Route::get('/profit','StatsController@profitsByMounth')->middleware('admin');
Route::get('/carRank','StatsController@rankCar')->middleware('admin');
Route::get('/milleur','StatsController@rankCarWithView');
Route::get('/newCar','StatsController@newCars');



//calendar
Route::get('/calendrier','CalendrierController@index')->middleware('comercial');
Route::post('/reserver','CalendrierController@reserver');
Route::get('/reservations/{id}','ClientController@reservationsParCilent');
Route::get('/annulerReservation/{id}','CalendrierController@annulerReservation');
Route::get('/Demandes','CalendrierController@demandes')->middleware('comercial');
Route::get('/approuver/{id}','CalendrierController@approuver')->middleware('comercial');














Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');