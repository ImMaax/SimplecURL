<?php
require 'vendor/autoload.php';

$client = new SimplecURL\Client;
$client->setUseragent('CustomUA/1.0.0');

# Object version:
$bag = new SimplecURL\ParameterBag;
$bag->setHeader('X-Some-Header', 'Value');
$bag->setPostfield('Foo', 'Bar');
$bag->allowRedirects();
$bag->setMaxRedirects(5);

$res = $client->request('POST', 'http://127.0.0.1:8080/', $bag);

# Array version:
$res = $client->request('POST', 'http://127.0.0.1:8080/', [
    'headers' => [
        'X-Some-Header: Value'
    ],
    'postfields' => [
        'Foo' => 'Bar'
    ],
    'redirects' => [
        'allow' => true,
        'maxRedirects' => 5
    ]
]);

print_r($res->getHeaders());
echo $res->getBody();
echo $res->getStatusCode();
