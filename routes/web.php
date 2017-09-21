<?php

Route::get('/', ['as' => 'home.index', 'uses' => 'HomeController@index']);
Route::get('signup', ['as' => 'home.signup', 'uses' => 'HomeController@signup']);
Route::post('make-signup', ['as' => 'home.make-signup', 'uses' => 'HomeController@makeSignup']);
Route::get('signin', ['as' => 'home.signin', 'uses' => 'HomeController@signin']);
Route::post('make-signin', ['as' => 'home.make-signin', 'uses' => 'HomeController@makeSignin']);
Route::get('signout', ['as' => 'home.signout', 'uses' => 'HomeController@signout']);
