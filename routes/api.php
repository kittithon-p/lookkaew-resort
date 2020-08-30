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

Route::post('/furniture', 'FurnitureController@store');

Route::get('/furniture', 'FurnitureController@index');

Route::get('/furniture/{id}', 'FurnitureController@show');

Route::delete('/furniture/{id}', 'FurnitureController@destroy');

Route::put('/furniture/{id}', 'FurnitureController@update');