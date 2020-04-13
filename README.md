# SimplecURL

[![Build Status](https://travis-ci.org/SimplecURL/SimplecURL.svg?branch=master)](https://travis-ci.org/SimplecURL/SimplecURL)

SimplecURL is a simple and modern wrapper around PHP's [`ext-curl`](https://www.php.net/manual/en/book.curl.php).

```php
$client = new SimplecURL\Client;
$res = $client->request('GET', 'http://127.0.0.1:8080/');

echo $res->getBody();
```

## Installation

```sh
composer require simplecurl/simplecurl
```

## Docs

Docs can be found in `/docs`.
