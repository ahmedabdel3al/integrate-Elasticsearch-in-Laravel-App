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

use App\Article;
use Illuminate\Http\Request;

Route::get('/articles', function (Request $request) {
    $articles = Article::all();
    return view('welcome', compact('articles'));
});
Route::post('/search', 'ElasticSearchController@search');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'ElasticSearchController@search');
