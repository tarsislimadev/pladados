<?php

Route::get('/', ['as' => 'home.index', 'uses' => 'HomeController@index']);
Route::get('signup', ['as' => 'home.signup', 'uses' => 'HomeController@signup']);
Route::post('make-signup', ['as' => 'home.make-signup', 'uses' => 'HomeController@makeSignup']);
Route::get('signin', ['as' => 'home.signin', 'uses' => 'HomeController@signin']);
Route::post('make-signin', ['as' => 'home.make-signin', 'uses' => 'HomeController@makeSignin']);
Route::get('signout', ['as' => 'home.signout', 'uses' => 'HomeController@signout']);

Route::group(['prefix' => 'loads'], function () {
    Route::get('/', ['as' => 'loads', 'uses' => 'LoadsController@index']);
    Route::get('create', ['as' => 'loads.create', 'uses' => 'LoadsController@create']);
    Route::get('edit/{$id}', ['as' => 'loads.edit', 'uses' => 'LoadsController@edit']);
    Route::post('save', ['as' => 'loads.save', 'uses' => 'LoadsController@save']);
    Route::post('load', ['as' => 'loads.load', 'uses' => 'LoadsController@load']);
});
