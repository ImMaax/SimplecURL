# SimplecURL - Custom Headers and the User Agent

**This project is archived. Use at your own caution.**

---

## Changing the User Agent

Under some circumstances you may need to change the library's user agent (the default user agent looks like this: `SimplecURL/0.1.0 (like cURL/7.67.0; PHP/7.4.1)`):

```php
$client = new SimplecURL\Client;
$client->setUseragent('CustomUA/1.0.0');
```

The above code snippet sets the client's user agent to `CustomUA/1.0.0`. It will be applied on all requests made using this client.

## Adding custom Headers

Attaching custom headers to a request is very easy:

```php
$bag = new SimplecURL\ParameterBag;
$bag->setHeader('Name', 'Value');

$res = $client->request('GET', 'http://127.0.0.1:8080/', $bag);

# +----+
# | Or |
# +----+

$res = $client->request('GET', 'http://127.0.0.1:8080/', [
    'headers' => [
        'Name: Value'
    ]
]);
```

This will add the header `Name` with a value of `Value`.

*Next: [Following Redirects](following-redirects.md)*
