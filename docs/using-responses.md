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

### JSON

To convert a JSON response to an object, use `json()`:

```php
$res = $client->request('GET', 'http://127.0.0.1:8080/');
print_r($res->json());
# +----+
# | Or |
# +----+
$res = $client->request('GET', 'http://127.0.0.1:8080/')->json();
print_r($res);
```

## Getting Headers

There are multiple ways to get all or one specific header:

```php
$res = $client->request('GET', 'http://127.0.0.1:8080/');

print_r($res->getHeaders());        # => Prints an array of all headers and their values: ['Header' => [ 0 => 'Value']]
print_r($res->getHeader('name'));   # => Prints an array with the value of the header "name": [0 => 'Value']
```

## Getting the Status Code

You can get the status code using `getStatusCode`:

```php
$res = $client->request('GET', 'http://127.0.0.1:8080/');

echo $res->getStatusCode();
```

It is a 3 digit integer.

*Next: [Custom Headers and the User-Agent](custom-headers-and-the-user-agent.md)*
