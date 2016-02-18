<?php

require __DIR__.'/vendor/autoload.php';


$params = [
    "base_url" => "http://localhost:8000",
    "defaults" => [
        "exception" => false
    ]
];

//$client = new \Guzzle\Http\Client($params);
$client = new \Guzzle\Http\Client($params['base_url']);
$response = $client->post('/api/programmers');
echo $response;
echo "\n\n";





