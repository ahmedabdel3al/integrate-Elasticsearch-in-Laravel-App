<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ElasticSearchController extends Controller
{
    public function search(Request $request)
    {
        $model = new Article();
        $result = app('clientBuilder')->search([
            'index' => $model->getSearchIndex(),
            'type' => $model->getSearchType(),
            'body' => [
                'query' => [
                    'match_phrase' => [
                        'title' => 'Aut fugit neque magni.',
                    ],
                ],
            ]
        ]);
        $nn = array_column($result, 'hits')[0];
        return array_column($nn, '_source');
        //dd($result);
    }
}
