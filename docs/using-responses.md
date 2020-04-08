# SimplecURL - Using Responses

Say you have a request like this:

```php
$res = $client->request('GET', 'http://127.0.0.1:8080/');
```

## Getting the Body

You can get the response body using `$res->getBody()`:

```php
$res = $client->request('GET', 'http://127.0.0.1:8080/');

echo $res->getBody();
```

## Getting Headers

There are multiple ways to get all or one specific header:

```php
$res = $client->request('GET', 'http://127.0.0.1:8080/');

print_r($res->getHeaders());        # => Prints an array of all headers and their values: ['Header' => [ 0 => 'Value']]
print_r($res->getHeader('name'));   # => Prints an array with the value of the header "name": [0 => 'Value']
```

*Next: [Custom Headers and the User-Agent](custom-headers-and-the-user-agent.md)*
