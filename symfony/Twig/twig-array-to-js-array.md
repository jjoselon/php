# How to 'convert' twig array to javascript array

> Taken template param (_d) from one `include`

```twig
{% include "AppBundle:OptionalController:index.html.twig" with {
    _d: ["^José Alejandro$"]
} only %}

{# index.html.twig ... #}

<script>
    var d1 = {{_d | json_encode}}; // [&quot;^José Alejandro$&quot;]
    var d2 = "{{_d | json_encode}}"; // "[&quot;^José Alejandro$&quot;]"
    var d3 = {{_d | json_encode | raw }}; // ["^José Alejandro$"]
    var d4 = "{{_d | json_encode | raw }}"; // "["^José Alejandro$"]"
    var d5 = {{_d}}; // Array
    var d6 = "{{_d}}" // "Array"
</script>


```
