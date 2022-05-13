<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {

        Route::get('/', 'HomeController@index')->name('home');

        Route::resource('apartments', 'ApartmentController');

        Route::get('/apartments/{slug}', 'ApartmentController@show');

        Route::get('/messages', 'MessageController@index')->name('messages.index');

        Route::get('/messages/{apartment}/{message}', 'MessageController@show');
    });

Route::get("{any?}", function () {
    return view('guests.home');
})->where("any", ".*");
