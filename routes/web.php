<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/sublist', 'SubListController@index');
Route::get('/sendmail', 'SendMailController@index');
Route::get('/settings', 'SettingsController@index');
Route::get('/model', 'HomeController@model');

Route::group(['middleware' => 'auth'], function (){
	Route::resource('subscribers', 'SubscriberController');
    Route::resource('lists', 'ListController');
    Route::get('/send-email', 'SendController@form');
    Route::post('/send-email', 'SendController@send');

    Route::post('/lists/addsubscriber','ListController@addsubscriber');
    Route::post('/lists/delsubscriber','ListController@delsubscriber');
    Route::get('/settings','SendController@showsettings')->middleware('locale');
    Route::post('/setsettings','SendController@setsettings')->middleware('locale');
});

Route::get('setlocale/{locale}/', function ($locale) {

    if (in_array($locale, \Config::get('app.locales'))) {
        Cookie::queue(Cookie::forever('lang', $locale));
    }

    return redirect()->back();

});

Route::get('/send-email', 'SendController@form');
Route::post('/send-email', 'SendController@send');