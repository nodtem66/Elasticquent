# nodtem66/Elasticquent

Forked from original: [elasticquent/elasticquent](https://github.com/elasticquent/Elasticquent)
with [cviebrock/laravel-elasticsearch](https://github.com/cviebrock/laravel-elasticsearch) to support the AWS

* [API Document](#api-document)
* [Overview](#overview)
* [Installation](#installation)

# Elasticsearch Requirements

You must be running _at least_ Elasticsearch 6.0. Otherwies, you have to custom the dependency `cviebrock/laravel-elasticsearch`.

## API Documentation

For Eloquent model:
[elasticquent/elasticquent](https://github.com/elasticquent/Elasticquent)
For Elasticsearch client:
[cviebrock/laravel-elasticsearch](https://github.com/cviebrock/laravel-elasticsearch)

## Overview

Elasticquent allows you take an Eloquent model and easily index and search its contents in Elasticsearch.

```php
    $books = Book::where('id', '<', 200)->get();
    $books->addToIndex();
```

When you search, instead of getting a plain array of search results, you instead get an Eloquent collection with some special Elasticsearch functionality.

```php
    $books = Book::search('Moby Dick');
    echo $books->totalHits();
```

Plus, you can still use all the Eloquent collection functionality:

```php
    $books = $books->filter(function ($book) {
        return $book->hasISBN();
    });
```

## Installation

* Install the current version via composer:

```sh
composer require nodtem66/elasticquent
```

Based on [cviebrock/laravel-elasticsearch](https://github.com/cviebrock/laravel-elasticsearch) document, 
The package's service provider will automatically register its service provider.

* Publish the configuration file:
```sh
php artisan vendor:publish --provider="Cviebrock\LaravelElasticsearch\ServiceProvider"
```

* Then add the Elasticquent trait to any Eloquent model that you want to be able to index in Elasticsearch:

```php
use Elasticquent\ElasticquentTrait;

class Book extends Eloquent
{
    use ElasticquentTrait;
}
```

Basic Elasticsearch client usage
```php
use Elasticquent\Elasticsearch;

Elasticsearch::indices()->create(['index'=>'default_index']);
```