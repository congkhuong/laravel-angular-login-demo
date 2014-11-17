<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/',  'UserController@signin');
Route::get('/home', 'HomeController@home');

Route::get('/getsession',  'UserAngularController@getsession');

Route::post('/postloginangular',  'UserAngularController@login');
Route::get('/users/logout',  'UserAngularController@logout');

Route::post('/signUp',  'UserAngularController@signup');

Route::get('/test', 'HomeController@test');

Route::group(array('prefix' => 'angular'), function(){
    Route::get('index', 'AngularController@index');

    Route::get('detail/{id}', 'AngularController@detail');
});
