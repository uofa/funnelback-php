<?php
/**
 * @file
 * Contains Funnelback\ClientTest
 */

namespace Funnelback;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Subscriber\Mock;

/**
 * Tests the client class.
 *
 * @coversDefaultClass \Funnelback\Client
 */
class ClientTest extends \PHPUnit_Framework_TestCase {

  /**
   * Tests the search method.
   */
  public function testSearch() {

    $http_client = new HttpClient();

    $response = new Response(200);
    $response->setHeader('Content-Type', 'application/xml;charset=UTF-8');
    $response->setBody(Stream::factory(fopen(__DIR__ . '/../Fixtures/search-results.json', 'r+')));
    $mock = new Mock([$response]);

    // Add the mock subscriber to the client.
    $http_client->getEmitter()->attach($mock);

    $config = [
      'base_url' => 'http://agencysearch.australia.gov.au',
      'collection' => 'agencies',
    ];

    $client = new Client($config, $http_client);

    $response = $client->search('test');

    $this->assertEquals('200', $response->getStatusCode(), 'Status code ok');
    $this->assertNotEmpty($response->json(), 'Question is available');

  }

}
