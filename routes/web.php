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

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('tags/{tag}', 'ArticleController@byTag')->name('article.tag');
Route::get('categories/{category}', 'ArticleController@byCategory')->name('article.category');
Route::group(['prefix' => 'articles'], static function () {
    Route::get('', 'ArticleController@index')
        ->name('article.index');
    Route::post('', 'ArticleController@store')
        ->name('article.store');
    Route::get('create', 'ArticleController@create')
        ->name('article.create');
    Route::get('{article}/edit', 'ArticleController@edit')
        ->name('article.edit');
    Route::get('{article}', 'ArticleController@show')
        ->name('article.show');
    Route::patch('{article}', 'ArticleController@update')
        ->name('article.update');
    Route::delete('{article}', 'ArticleController@destroy')
        ->name('article.destroy');
});

Route::get('/home', 'HomeController@index')
    ->name('home');
Route::get('/about', 'PageController@about')
    ->name('about');
Route::get('/team', 'PageController@team')
    ->name('team');

Route::resource('categories', 'CategoryController');
Auth::routes();
