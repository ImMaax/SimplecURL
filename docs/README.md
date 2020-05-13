# SimplecURL Documentation

Welcome to the SimplecURL docs! SimplecURL is an object-oriented wrapper around PHP's `ext-curl`. It allows for easy and quick HTTP requests.

```php
$client = new SimplecURL\Client;
$res = $client->request('GET', 'http://127.0.0.1:8080/');

echo $res->getBody();
```

## Table of Contents

- [Installation](installation.md)
- [Making a Request](making-a-request.md)
- [Parameter Bags](parameter-bags.md)
- [Using Responses](using-responses.md)
- [Custom Headers and the User-Agent](custom-headers-and-the-user-agent.md)
- [Following Redirects](following-redirects.md)
- [Base URL](base-url.md)
