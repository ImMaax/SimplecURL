<?php
use PHPUnit\Framework\TestCase;

class ResponseTest extends TestCase {

    protected $res;

    public function setUp(): void {
        $this->res = (new SimplecURL\Client)->request('GET', 'https://httpbin.org/json');
    }

    public function testBody(): void {
        $this->assertNotEmpty($this->res->getBody());
    }

    public function testHeaders(): void {
        $this->assertNotEmpty($this->res->getHeaders());
    }

    public function testHeader(): void {
        $this->assertNotEmpty($this->res->getHeader('date')[0]);
    }

    public function testStatusCode(): void {
        $this->assertIsInt($this->res->getStatusCode());
    }

    public function testJsonConversion(): void {
        $this->assertIsObject($this->res->json());
    }

}
