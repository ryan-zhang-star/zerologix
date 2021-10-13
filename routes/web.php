<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('login/twitter', 'App\Http\Controllers\Auth\LoginController@redirectToProvider')->name('loginWithFacebook');
Route::get('login/facebook/callback', 'App\Http\Controllers\Auth\LoginController@handleProviderCallback');

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('posts', 'App\Http\Controllers\PostController@index');
