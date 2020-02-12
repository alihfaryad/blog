<?php
use Spatie\Sitemap\SitemapGenerator;
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
Route::get('/about', "PagesController@about");
Route::get('/contact', "PagesController@contact");
Route::get('/toolbox', "PagesController@toolbox");
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/blog', "BlogController@index");
Route::get('/blog/{uri}', 'BlogController@post');
Route::get('/blog/search', 'BlogController@search');
Route::get('/blog/search/results', 'BlogController@search_results')->name('search.results');
Route::get('/blog/category/{uri}', 'BlogController@category');

Route::group(['prefix' => 'dashboard'], function(){
    Route::auth();
});

Route::resource('/dashboard/posts', 'PostController');
Route::resource('/dashboard/users', 'UserController');
Route::resource('/dashboard/images', 'ImageController');
Route::resource('/dashboard/categories', 'CategoryController');

Route::get('/sitemap', function(){
    SitemapGenerator::create('https://alidevs.com')->writeToFile('sitemap.xml');
    return 'Sitemap generated';
});
