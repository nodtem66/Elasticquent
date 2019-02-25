<?php

namespace Elasticquent;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Elasticquent\ElasticquentServiceProvider
 */
class Elasticsearch extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'elasticsearch';
    }
}
