This library provides a PHP client to the Funnelback Seach API.

The goal of this library is to provide a clean and simple interface to Funnelback
search, exposing the most commonly used fields as PHP classes and methods, while
still providing access to the raw results data.

## Installation

This project can be installed using Composer. Add the following to your composer.json:

```
{
  "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/uofa/funnelback-php"
        }
    ],
    "require": {
        "uofa/funnelback-php": "dev-master"
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

// Loop through the facets.
foreach ($response->getFacets() as $facet) {
  $facet->getName();
  // Loop through the facet items.
  foreach ($facet->getFacetItems() as $facet_item) {
    $facet_item->getLabel();
    $facet_item->getCount();
    $facet_item->getQueryStringParam();
  }
}

```

## Updates

Changes that were implemented on top of the original version <https://github.com/uofa/funnelback-php>
- bumped dependencies for Guzzle and PHPUnit
- PSR-2 code style tweaks
