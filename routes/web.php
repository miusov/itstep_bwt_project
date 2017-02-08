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
});

Route::get('setlocale/{locale}/', function ($locale) {

    if (in_array($locale, \Config::get('app.locales'))) {
        Cookie::queue(Cookie::forever('lang', $locale));
    }

    return redirect()->back();

});