<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::namespace('Library')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::namespace('Admin')->middleware(['admin'])->group(function () {
    Route::get('admin', 'IndexController@index')->name('admin.index');

    Route::prefix('admin/author')->name('author.')->group(function (){
        Route::get('/{author}/edit', 'AuthorController@edit')->name('edit');
        Route::get('/create', 'AuthorController@create')->name('create');
        Route::put('/update/{author}', 'AuthorController@update')->name('update');
        Route::post('/store', 'AuthorController@store')->name('store');
        Route::delete('/destroy/{author}', 'AuthorController@destroy')->name('destroy');
    });

    Route::prefix('admin/book')->name('book.')->group(function (){
        Route::get('/{book}/edit', 'BookController@edit')->name('edit');
        Route::get('/create', 'BookController@create')->name('create');
        Route::put('/update/{book}', 'BookController@update')->name('update');
        Route::post('/store', 'BookController@store')->name('store');
        Route::delete('/destroy/{book}', 'BookController@destroy')->name('destroy');
    });
});
