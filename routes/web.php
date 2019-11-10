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
use Illuminate\Support\Facades\Redis;

Route::get('/articles', function (Request $request) {
    $articles = Article::all();
    return view('welcome', compact('articles'));
});
Route::post('/search', 'ElasticSearchController@search');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', function (Request $request) {
    $model = new Article();
    $params = [
        'index' => $model->getSearchIndex(),
        'type' => $model->getSearchType(),
        "body" => [
            "query" => [
                "bool" => [
                    // "must" => ["match_phrase" => ["title" => "ut blanditiis quae "]],
                    "filter" => ["range" => ["id" => ["gte" => "1"]]]

                ]
            ]
        ]
    ];
    return  app('clientBuilder')->search($params);
});
Route::get('test', function () {
    dd(Redis::set('name', 'ahmed'));
});
