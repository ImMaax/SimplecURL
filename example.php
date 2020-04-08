<?php
require 'vendor/autoload.php';

$client = new SimplecURL\Client;
$client->setUseragent('CustomUA/1.0.0');

$res = $client->request('POST', 'http://127.0.0.1:8080/', [
    'headers' => [
        'X-Some-Header: Value'
    ],
    'postfields' => [
        'Foo' => 'Bar'
    ]
]);

print_r($res->getHeaders());
echo $res->getBody();
