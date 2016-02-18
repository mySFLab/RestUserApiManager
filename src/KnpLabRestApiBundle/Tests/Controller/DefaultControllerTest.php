<?php

namespace KnpLabRestApiBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/api/programmer/laurentPro');


        $result = '{
            nickname: "laurentPro",
            avatarNumber: "1",
            tagLine: null,
            powerFullLevel: null
            }';
        $this->assertContains($result, $client->getResponse()->getContent());
    }
}
