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

// [view] home
Route::get('/', 'HomeController@getHome')->name('home');

// [view] auth.register
Route::get('/auth/register', 'Auth\RegisterController@getRegister')->name('auth.register');
Route::post('/auth/register', 'Auth\RegisterController@postRegister');
// auth.logout
Route::get('/auth/logout', 'Auth\LogoutController@getLogout')->name('auth.logout');
Route::post('/auth/logout', 'Auth\LogoutController@postLogout');
// [view] auth.login
Route::get('/auth/login', 'Auth\LoginController@getLogin')->name('auth.login');
Route::post('/auth/login', 'Auth\LoginController@postLogin');
// [view] auth.password.forgot
Route::get('/auth/password/forgot', 'Auth\Password\ForgotController@getForgot')->name('auth.password.forgot');
Route::post('/auth/password/forgot', 'Auth\Password\ForgotController@postForgot');
// [view] auth.password.reset
Route::get('/auth/password/reset/{email}/{token}', 'Auth\Password\ResetController@getReset')->name('auth.password.reset');
Route::post('/auth/password/reset/{email}/{token}', 'Auth\Password\ResetController@postReset');

// shorten
Route::get('/shorten', 'ShortenController@getShorten')->name('shorten');
Route::post('/shorten', 'ShortenController@postShorten');

// redirect
Route::get('/{token}', 'RedirectController@getRedirect')->name('redirect');
