<?php

namespace App\Traits;

use App\Observers\ElasticSearchObserver;

trait Searchable
{
    public static function bootSearchable()
    {
        if (env('ELASTIC_SEARCH_ENABLE', true)) {
            static::observe(ElasticSearchObserver::class);
        }
    }
    /**
     * Get Index 
     */
    public function getSearchIndex()
    {
        if (property_exists($this, 'useSearchIndex')) {
            return $this->useSearchType;
        }
        return $this->getTable();
    }
    /**
     * Get Type 
     */
    public function getSearchType()
    {
        if (property_exists($this, 'getSearchType')) {
            return $this->getSearchType;
        }
        return $this->getTable();
    }
    /**
     * Covert model to Array 
     */
    public function toSearchArray()
    {
        // By having a custom method that transforms the model
        // to a searchable array allows us to customize the
        // data that's going to be searchable per model.
        return $this->toArray();
    }
}
