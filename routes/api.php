<?php

use Illuminate\Http\Request;

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


Route::group(["middleware" => ["cors"]], function () {
    Route::get("/movies/byLongestCrawl", "FilmController@byLongestCrawl");
    Route::get("/movies/characterByMostAppearance", "FilmController@characterByMostAppearance");
    Route::get("/movies/speciesByMostAppearance", "FilmController@speciesByMostAppearance");
    Route::get("/movies/largestNoOfVehicle", "FilmController@largestNoOfVehicle");

});



