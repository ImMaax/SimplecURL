# SimplecURL - Base URL

You can set a base URL for every request:

```php
$client = new SimplecURL\Client('https://httpbin.org');
$client->request('GET', '/get');    # Makes a request to https://httpbin.org/get
$client->request('POST', '/post');  # Makes a request to https://httpbin.org/post
```

This might be helpful if you create a client for use with a single server or with a specific directory, as you don't need to specify the base URL over and over again in each request.
