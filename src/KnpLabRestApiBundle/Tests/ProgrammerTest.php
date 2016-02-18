<?php

namespace KnpLabRestApiBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProgrammerControllerTest extends WebTestCase
{
    public function testPOST()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/api/programmer/laurentPro');
        $this->assertEquals(
            '{"nickname":"laurentPro","avatarNumber":"1","tagLine":null,"powerFullLevel":null}',
            $client->getResponse()->getContent()
        );
    }
}