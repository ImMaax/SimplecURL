<?php
namespace SimplecURL;

final class ParameterBag {

    protected $headers = [];

    protected $postfields = [];

    protected $allow_redirects = true;

    protected $max_redirects = 10;

    public function setHeaders(array $headers): void {
        $this->headers = $headers;
    }

    public function getHeaders(): array {
        return $this->headers;
    }

    public function setHeader(string $name, string $value): void {
        $this->headers[] = $name . ': ' . $value;
    }

    public function setPostfields(array $postfields): void {
        $this->postfields = $postfields;
    }

    public function getPostfields(): array {
        return $this->postfields;
    }

    public function setPostfield(string $name, string $value): void {
        $this->postfields[$name] = $value;
    }

    public function getPostfield(string $name): string {
        return $this->postfields[$name];
    }

    public function allowRedirects(): void {
        $this->allow_redirects = true;
    }

    public function disallowRedirects(): void {
        $this->allow_redirects = false;
    }

    public function getRedirectsAllowed(): bool {
        return $this->allow_redirects;
    }

    public function setMaxRedirects(int $max_redirects): void {
        $this->max_redirects = $max_redirects;
    }

    public function getMaxRedirects(): int {
        return $this->max_redirects;
    }

}
