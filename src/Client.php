<?php
namespace SimplecURL;

class Client {

    protected $useragent;

    protected $baseurl;

    const VERSION = '0.1.2';

    public function __construct(string $baseurl = '') {
        $this->setUseragent($this->defaultUseragent());
        $this->baseurl = $baseurl;
    }

    public function setUseragent(string $useragent): void {
        $this->useragent = $useragent;
    }

    public function getUseragent(): string {
        return $this->useragent;
    }

    public function request(string $method, string $url, $options = []): Response {
        switch (gettype($options)) {
            case 'array':
                # Everything stays the same
            break;
            case 'object':
                if (get_class($options) != 'SimplecURL\\ParameterBag') {
                    throw new \InvalidArgumentException('The options passed to a new request must be either an array or a ParameterBag, got ' . get_class($options));
                }

                $parameters = $options;
                $options = [
                    'redirects' => []
                ];

                $options['headers'] = $parameters->getHeaders();
                $options['postfields'] = $parameters->getPostfields();
                $options['redirects']['allow'] = $parameters->getRedirectsAllowed();
                $options['redirects']['max'] = $parameters->getMaxRedirects();
            break;
            default:
                throw new \InvalidArgumentException('The options passed to a new request must be either an array or a ParameterBag, got ' . gettype($options));
        }

        $req = new Request();

        $req->allowRedirects();
        $req->setMethod($method);
        $req->setUrl($this->baseurl . $url);
        $req->setUseragent($this->getUseragent());

        if (isset($options['headers'])) {
            $req->setHeaders($options['headers']);
        }

        if (isset($options['postfields'])) {
            $req->setPostfields(http_build_query($options['postfields']));
        }

        if (isset($options['redirects'])) {
            if (isset($options['redirects']['allow']) && $options['redirects']['allow'] == false) {
                $req->disallowRedirects();
            }

            if (isset($options['redirects']['max'])) {
                $req->maxRedirects($options['redirects']['max']);
            } else {
                $req->maxRedirects(10);
            }
        }

        return $req->send();
    }

    protected function defaultUseragent(): string {
        return 'SimplecURL/' . self::VERSION . ' (like cURL/' . curl_version()['version'] . '; PHP/' . phpversion() . ')';
    }

}
