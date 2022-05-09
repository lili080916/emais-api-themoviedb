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

Route::group(['prefix' => 'movies'], function () {
    Route::get('', 'MovieController@getAllMovies')->name('api.movie.index');
    Route::get('{id}', 'MovieController@getMovieById')->name('api.movie.show');
    Route::post('', 'MovieController@createMovie')->name('api.movie.store');
});
