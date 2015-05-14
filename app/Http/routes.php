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

///Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//AdminUserController
Route::get('/', 'Admin\AdminUserController@index');
Route::post('/user_login', 'Admin\AdminUserController@user_login');


//AdminEnquiryController
Route::match(array('GET', 'POST'), '/enquiry', array('as' => 'enquiry', 'uses' => 'Admin\AdminEnquiryController@index'));

//AdminDashboardController
Route::get('/dashboard', array('as' => 'dashboard', 'uses' => 'Admin\AdminDashboardController@index'));