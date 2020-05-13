# SimplecURL - Parameter Bags

## What are they and how do they work?

Look at the following request example:

```php
$res = $client->request('POST', 'http://127.0.0.1:8080/', [
    'postfields' => [
        'Foo' => 'Bar'
    ]
]);
```

The above snippet uses an array for additional options.
However, you can also use objects to set options:

```php
$bag = new SimplecURL\ParameterBag;
$bag->setPostfield('Foo', 'Bar');

$res = $client->request('POST', 'http://127.0.0.1:8080/', $bag);
```

Both code snippets will produce the exact same result.
Everything that can be set using arrays can also be set using a parameter bag:

```php
$bag = new SimplecURL\ParameterBag;

$bag->setHeader('Some-Header', 'True');
$bag->setPostfield('Foo', 'Bar');
$bag->allowRedirects(); /* and */ $bag->disallowRedirects();
$bag->setMaxRedirects(10);
```

Those values can also be retrieved from the bag:

```php
$bag->getHeaders();
$bag->getPostfields();
$bag->getPostfield('SomeField');
$bag->getRedirectsAllowed();
$bag->getMaxRedirects();
```

## Should I use arrays or parameter bags?

That's totally up to you, it's just personal preference.
This manual will show both ways of doing it.

*Next: [Using Responses](using-responses.md)*
