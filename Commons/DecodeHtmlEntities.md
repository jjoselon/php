```php
/* Convierte todas las entidades html a sus caracteres correspondientes
 bien sea que su sistema este como Hexadecimal, Decimal o como la misma Html Entity
 
 E.g:
¡ (Unicode Named Character Inverted Exclamation Mark )
   Hex Code:	&#xa1;
   Decimal Code:	&#161;
   Html Entity:	&iexcl;
 */
 // As Hex Code (see 'x' after '#')
html_entity_decode('&#xa1;') // print --> ¡
 // As Decimal Code
html_entity_decode('&#161;') // print --> ¡
 // As html entity
html_entity_decode('&iexcl;') // print --> ¡
```

Mas info [https://www.php.net/manual/es/function.html-entity-decode.php](https://www.php.net/manual/es/function.html-entity-decode.php)
