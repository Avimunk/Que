<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//
//Route::get('/', function () {
////    $currentGuest = App\Que::where('table_id', 1)->orderBy('the_time')->limit(1)->get();
////    return $currentGuest;
//});
//Route::get('/', function () {
//    return view('screen');
//});
Route::get('/', 'GuestsController@getRegistration');

Route::get('/testdrive', function () {
    return view('screenTestdrive');
});

Route::get('que/current/', 'GuestsController@currentQue');

Route::get('plasma', function () {
    return view('screen');
});

Route::resource('guests.routes', 'GuestsRoutesController');


Route::get('registration', 'GuestsController@getRegistration');
Route::get('registration/all/', 'GuestsController@getAll');
Route::get('get/all/Json', 'GuestsController@getAllJson');


Route::get('registration/check/all', 'GuestsController@getUnregisteredIds');



Route::get('distribution/{id}/{table}', 'GuestsController@getDistribution');
Route::get('distribution/{branche}/{table}/take/{id}', 'GuestsController@take');
Route::get('distribution/{branche}/{table}/taketestdrive/{id}', 'GuestsController@takeTestDrive');
Route::get('distribution/{branche}/{table}/release/{id}', 'GuestsController@release');
Route::get('distribution/{branche}/{table}/nextstep/{id}', 'GuestsController@nextStep');
Route::get('distribution/{branche}/{table}/finish/{id}', 'GuestsController@finish');




Route::get('finish/{table}', 'GuestsController@finishWork');
Route::get('start/{table}', 'GuestsController@startWork');




Route::get('branche/all/{table}', 'GuestsController@getAllBranches');
Route::get('branche/{id}/{table}', 'GuestsController@getBranche');


Route::get('testdrive/{id}/{table}', 'GuestsController@getTestDrive');
Route::get('putGuestBackToDistribution/{id}', 'GuestsController@putGuestBackToDistribution');

Route::resource('guests', 'GuestsController');
Route::post('guests/store', 'GuestsController@store');


Route::get('guests/{id}/register/branch/{branch}', 'GuestsController@registerGuest');

Route::get('/all/', 'GuestsController@all');
Route::get('/changePosition/{id}/{branch}', 'GuestsController@changeGuestBranche');