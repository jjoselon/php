# [Creating a JSON Response](https://symfony.com/doc/current/components/http_foundation.html#creating-a-json-response)

### With `Response` class (Useful to add custom headers)
```php
use Symfony\Component\HttpFoundation\Response;

$response = new Response();
$response->setContent(json_encode(array(
    'data' => 123,
)));
$response->headers->set('Content-Type', 'application/json');
return $response;
```

### With `JsonResponse` class
```php
$response = new JsonResponse();
$response->setData(array(
    'data' => 123,
));
return $response;
```
