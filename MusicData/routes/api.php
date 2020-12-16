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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('album', 'ApiController@getAllAlbum');
Route::get('album/{id}', 'ApiController@getAlbum');
Route::post('album/create', 'ApiController@createAlbum');
Route::put('album/update/{id}', 'ApiController@updateAlbum');
Route::delete('album/{id}', 'ApiController@deleteAlbum');
