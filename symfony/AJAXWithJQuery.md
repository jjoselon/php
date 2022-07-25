### Controller code

```php
    /**
     * @Route("/ajax-route", name="ajax_route", condition="request.isXmlHttpRequest()", methods={"GET"})
     * 
     * @return Response Json information details
     */
    public function getAjaxDataAction() {
        $response = new Response();
        $response->setContent(json_encode(array('data' => ['hello' => 'world'])));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
```

### Js code
```js
    $.ajax({
        type: 'GET',
        url: '/ajax-route',
        dataType: 'json',
        headers: {
            'Accept': 'application/json'
        },
        success: function (json) {}, 
        error : function(xhr) {
            var err = xhr.responseText;
            console.log(err);
        },
    });
```
