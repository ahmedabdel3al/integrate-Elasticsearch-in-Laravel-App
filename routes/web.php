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

use App\Articles\EloquentRepository;
use Elasticsearch\ClientBuilder;
use Illuminate\Http\Request;

Route::get('search', function (Request $request) {
    $client = ClientBuilder::create()->build();
    $articles = new EloquentRepository($client);
    if ($request->query('q')) {
        $articles = $articles->search2($request->query('q') ?: '');
    } else {
        $articles = $articles->search($request->query('q') ?: '');
    }
    return view('welcome', compact('articles'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
