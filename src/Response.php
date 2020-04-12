<?php
namespace SimplecURL;

class Response {

    protected $headers;

    protected $body;

    protected $statusCode;

    public function getHeaders(): array {
        return $this->headers;
    }

    public function setHeaders(array $headers): void {
        $this->headers = $headers;
    }

    public function getHeader(string $name) {
        if ($this->doesHeaderExist($name)) {
            return $this->getHeaders()[$name];
        } else {
            return null;
        }
    }

    public function setHeader(string $name, string $value): void {
        $this->headers[$name] = [
            0 => $value
        ];
    }

    public function doesHeaderExist(string $name): bool {
        return isset($this->getHeaders()[$name]);
    }

    public function getBody(): string {
        return $this->body;
    }

    public function setBody(string $body): void {
        $this->body = $body;
    }

    public function setStatusCode(int $status): void {
        $this->statusCode = $status;
    }

    public function getStatusCode(): int {
        return $this->statusCode;
    }

}
