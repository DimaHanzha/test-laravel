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

Route::namespace('Api')->prefix('v1/')->group(function () {
    Route::prefix('books')->name('books')->group(function (){
        Route::get('/list', 'BookController@index')->name('list');
        Route::get('/{book}','BookController@show')->name('showById');
        Route::patch('/update/{book}','BookController@update')->name('update');
        Route::delete('/delete/{book}', 'BookController@destroy')->name('delete');
    });
});
