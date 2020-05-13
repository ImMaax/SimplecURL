# SimplecURL - Following Redirects

By default, SimplecURL follows all redirects. However, you can either completely disable that behavior or limit it to a given number of redirects:

```php
$bag = new SimplecURL\ParameterBag;
$bag->allowRedirects();
$bag->setMaxRedirects(5);

$res = $client->request('POST', 'http://127.0.0.1:8080/', $bag);

# +----+
# | Or |
# +----+

$res = $client->request('POST', 'http://127.0.0.1:8080/', [
    'redirects' => [
        'allow' => true,
        'maxRedirects' => 5
    ]
]);
```

The above example allows up to 5 redirects.

```php
$bag = new SimplecURL\ParameterBag;
$bag->disallowRedirects();

$res = $client->request('POST', 'http://127.0.0.1:8080/', $bag);

# +----+
# | Or |
# +----+

$res = $client->request('POST', 'http://127.0.0.1:8080/', [
    'redirects' => [
        'allow' => false
    ]
]);
```

This example disables redirects completely.

*[Next: Base URL](base-url.md)*
