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
        
        $json = json_decode($res->getBody());
        $this->assertObjectHasAttribute('Unit', $json->form);
    }

    public function testHeaders(): void {
        $res = $this->client->request('GET', 'https://httpbin.org/headers', [
            'headers' => [
                'X-Unit-Test: True'
            ]
        ]);
        
        $json = json_decode($res->getBody());
        $this->assertObjectHasAttribute('X-Unit-Test', $json->headers);
    }

    public function testRedirectsAllowed(): void {
        try {
            $res = $this->client->request('GET', 'https://httpbin.org/headers', [
                'redirects' => [
                    'allow' => true
                ]
            ]);

            $this->assertInstanceOf(SimplecURL\Response::class, $res);
        } catch(SimplecURL\HttpRequestException $e) {
            $this->fail('Redirects were allowed, but the client didn\'t follow the redirect.');
        }
    }

    public function testUseragent(): void {
        $this->client->setUseragent('UnitTestRequest/0.1.0');
        $res = $this->client->request('GET', 'http://httpbin.org/user-agent');

        $json = json_decode($res->getBody());
        $this->assertEquals('UnitTestRequest/0.1.0', $json->{'user-agent'});
    }

}
