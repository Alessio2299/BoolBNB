<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::resource('/apartments', 'Api\ApartmentController');
Route::get('/apartments/{address}', 'Api\ApartmentController@index');

Route::get('/amenities', 'Api\AmenityController@index');

Route::post('/apartments/filter', 'Api\ApartmentController@filterApartments');

Route::get('/all/apartments', 'Api\ApartmentController@all');

Route::get('/apartments/single-apartment/{slug}', 'Api\ApartmentController@show');

Route::post('/messages/apartment/{slug}', 'Api\MessageController@store')->name('messages.apartment');
