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



Auth::routes();

Route::middleware('auth')
    ->namespace('admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/',  'HomeController@index');
        Route::resource('/posts', 'PostsController');

                
        Route::get('/categories/{id}', 'CategoriesController@show')->name('category');
    });
    




Route::get('{any?}' , function() {
    return view('guest.home');
})->where('any', '.*');
