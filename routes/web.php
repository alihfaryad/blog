<?php

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

Route::get('/', "PagesController@index");
Route::get('/{uri}', 'PagesController@post');
Route::get('/search', 'PagesController@search');
Route::get('/search/results', 'PagesController@search_results')->name('search.results');

Route::group(['prefix' => 'dashboard'], function(){
    Route::auth();
});

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::resource('/dashboard/posts', 'PostController');
Route::resource('/dashboard/users', 'UserController');