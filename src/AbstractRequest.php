<?php
namespace SimplecURL;

abstract class AbstractRequest {

    protected $method;

    protected $url;

    protected $postfields;

    protected $useragent;

    protected $headers;

    public function setMethod(string $method): void {
        $this->method = $method;
    }

    public function setUrl(string $url): void {
        $this->url = $url;
    }

    public function setUseragent(string $useragent): void {
        $this->useragent = $useragent;
    }

    public function setHeaders(array $headers): void {
        $this->headers = $headers;
    }

    public function setPostfields(string $fields): void {
        $this->postfields = $fields;
    }

    abstract function send(): Response;

}
