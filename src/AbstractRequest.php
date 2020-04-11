<?php
namespace SimplecURL;

abstract class AbstractRequest {

    protected $method;

    protected $url;

    protected $postfields;

    protected $useragent;

    protected $headers;

    protected $allowRedirects;

    protected $maxRedirects;

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

    public function disallowRedirects(): void {
        $this->allowRedirects = false;
    }

    public function allowRedirects(): void {
        $this->allowRedirects = true;
    }

    public function maxRedirects(int $maxRedirects): void {
        $this->maxRedirects = $maxRedirects;
    }

    abstract public function send(): Response;

}
