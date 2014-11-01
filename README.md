# Funnelback PHP [![Build Status](https://travis-ci.org/previousnext/funnelback-php.svg)](https://travis-ci.org/previousnext/funnelback-php)

This library provides a PHP client to the Funnelback Seach API.

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

$results = $client->search('my search query');
```

## To Do

Create a result object for easier handling of results.
