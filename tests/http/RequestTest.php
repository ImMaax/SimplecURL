<?php
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase {

    protected $client;

    public function setUp(): void {
        $this->client = new SimplecURL\Client;
    }

    public function testClient(): void {
        $this->assertInstanceOf(SimplecURL\Client::class, $this->client);
    }

    public function testGet(): void {
        $res = $this->client->request('GET', 'https://httpbin.org/get');
        $this->assertInstanceOf(SimplecURL\Response::class, $res);
    }

    public function testPost(): void {
        $res = $this->client->request('POST', 'https://httpbin.org/post', [
            'postfields' => [
                'Unit' => 'Test'
            ]
        ]);
        $this->assertInstanceOf(SimplecURL\Response::class, $res);
    }

    # Work in Progress!

}
