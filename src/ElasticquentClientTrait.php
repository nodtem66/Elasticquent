<?php

namespace Elasticquent;

use Cviebrock\LaravelElasticsearch\Facade;

trait ElasticquentClientTrait
{
    use ElasticquentConfigTrait;
    /**
     * Get ElasticSearch Client
     *
     * @return \Elasticsearch\Client
     */
    public function getElasticSearchClient()
    {
        return Facade;
    }
}
