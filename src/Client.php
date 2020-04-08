<?php
namespace SimplecURL;

class Client {

    protected $useragent;

    const VERSION = '0.1.0';

    public function __construct() {
        $this->setUseragent($this->defaultUseragent());
    }

    public function setUseragent(string $useragent): void {
        $this->useragent = $useragent;
    }

    public function getUseragent(): string {
        return $this->useragent;
    }

    public function request(string $method, string $url, array $options = []): Response {
        $req = new Request();

        $req->setMethod($method);
        $req->setUrl($url);
        $req->setUseragent($this->getUseragent());
        if (isset($options['headers'])) $req->setHeaders($options['headers']);
        if (isset($options['postfields'])) $req->setPostfields(http_build_query($options['postfields']));

        return $req->send();
    }

    protected function defaultUseragent(): string {
        return 'SimplecURL/' . self::VERSION . ' (like cURL/' . curl_version()['version'] . '; PHP/' . phpversion() . ')';
    }

}
