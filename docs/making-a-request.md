# SimplecURL - Making a Request

## Creating a new Client

To make requests, you need to create a client:

```php
$client = new SimplecURL\Client;
```

## Sending a Request

```php
$res = $client->request('GET', 'http://127.0.0.1:8080/');
```

The above code snippet sends a `GET` request to `http://127.0.0.1:8080/`.

You can also use other methods, such as `DELETE`, to make your requests:

```php
$res = $client->request('DELETE', 'http://127.0.0.1:8080/');
```

## Sending `POST` Data

If you want to send some form data using a `POST` request, pass it to `request()`'s options array:

```php
$res = $client->request('POST', 'http://127.0.0.1:8080/', [
    'postfields' => [
        'Foo' => 'Bar'
    ]
]);
```

This will add the `POST` parameter `Foo` with a value of `Bar` to your request.

*Next: [Parameter Bags](parameter-bags.md)*
