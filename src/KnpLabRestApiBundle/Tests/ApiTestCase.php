<?php

namespace KnpLabRestApiBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiTestCase extends WebTestCase
//class ApiTestCase extends \PHPUnit_Framework_TestCase
{
    private static $staticClient;


    /**
     * @var Client
     */
    protected $client;

    public function setUpBeforeClass()
    {
//        self::$staticClient = new Client([
//            'base_url' => 'http://localhost:8000',
//            'defaults' => [
//                'exceptions' => false
//            ]
//        ]);

        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $this->assertContains('Hello World', $client->getResponse()->getContent());


//        $client = static::$kernel->getContainer()->get('test.client');
//        $client->setServerParameters($server);
    }

    protected function setUp()
    {
        $this->client = self::$staticClient;
    }
}