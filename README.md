# Funnelback PHP [![Build Status](https://travis-ci.org/previousnext/funnelback-php.svg)](https://travis-ci.org/previousnext/funnelback-php)

This library provides a PHP client to the Funnelback Seach API.

The goal of this library is to provide a clean and simple interface to Funnelback
search.

The key properties are available behind model objects and their methods.


## Installation

This project can be installed using Composer. Add the following to your composer.json:

```
{
    "require": {
        "previousnext/funnelback-php": "0.0.*"
    }
}
```

## Usage

```php
$client = new \Funnelback\Client([
  'collection' => 'my_collection',
  'base_url' => 'http://example.funnelback.com.au/'
]);

$response = $client->search('my search query');

// Get summary info.
$summary = $response->getResultsSummary();
$summary->getQuery(); // The query used.
$summary->getTotal(); // Total search results

// Loop through the results.
foreach($response->getResults() as $result) {
  $result->getTitle();
  $result->getSummary();
  $result->getDate()->format('Y-m-d');
  $result->getLiveUrl();
  $result->getClickUrl();
  $result->getCacheUrl();
}


```

## To Do

Support other formats. Only JSON supported currently.

