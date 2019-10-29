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

Route::get('search', function (Request $request) {
    $articles = Article::all();
    return view('welcome', compact('articles'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
