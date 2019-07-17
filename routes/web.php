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

//General Route Starts
Route::get('/', function () {
    return view('welcome');
});
//General Route Ends

//User route Starts
Auth::routes();
Route::get('/google/login', 'Auth\LoginController@redirectToProvider');
Route::get('/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('/home', 'UserController@index')->name('home');
//User route Ends

//Admin route Starts
Route::get('/admin/login','AdminAuth\LoginController@showLoginForm');
Route::post('/admin/login','AdminAuth\LoginController@login');
Route::get('/admin/logout','AdminAuth\LoginController@logout');

// Registration Routes...
Route::get('admin/register','AdminAuth\RegisterController@showRegistrationForm');
Route::post('admin/register', 'AdminAuth\RegisterController@register');

//home after login/register 
Route::get('/admin/home', 'AdminController@index');
Route::get('/admin/logout','AdminAuth\LoginController@logout');
//Admin route Ends


//fetch api route starts
Route::get('/fetchusers', 'FetchApiController@fetchusers');
Route::get('/createuser', 'FetchApiController@createuser');
Route::get('/deleteuser', 'FetchApiController@deleteuser');

//fetch api route ends