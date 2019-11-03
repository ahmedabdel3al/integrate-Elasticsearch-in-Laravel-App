<?php

namespace App\Observers;

class ElasticSearchObserver
{
    /**
     * indexed model 
     */
    public function saved($model)
    {
        app('clientBuilder')->index([
            'index' => $model->getSearchIndex(),
            'type' => $model->getSearchType(),
            'id' => $model->getKey(),
            'body' => $model->toSearchArray(),
        ]);
    }
    /**
     * update indexed model 
     */
    public function updated($model)
    {
        app('clientBuilder')->update([
            'index' => $model->getSearchIndex(),
            'type' => $model->getSearchType(),
            'id' => $model->getKey(),
            'body' => $model->toSearchArray(),
        ]);
    }
    /**
     * delete indexed model 
     */
    public function delete($model)
    {
        app('clientBuilder')->update([
            'index' => $model->getSearchIndex(),
            'type' => $model->getSearchType(),
            'id' => $model->getKey(),
        ]);
    }
}
