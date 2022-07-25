
# Operador de fusion null [link](http://php.net/manual/es/migration70.new-features.php#migration70.new-features.null-coalesce-op)
```php
# SI $_POST["ANYTHING"] existe y no es NULL
echo $_POST["ANYTHING"] ?? "La variable es nula o no existe";
```

# Operador ternario (shortcut) [link](https://lornajane.net/posts/2015/new-in-php-7-null-coalesce-operator)
**Podemos saltar el segundo parametro si este es igual al primero** 
```php
$foo = "bar";
echo $foo ? $foo : "no exits";
// es equivalente a 
echo $foo ?: "no exists"
```


# Diferencias entre las funciones `var_dump` y `print_r` [link](https://cybmeta.com/php-diferencias-entre-echo-print-print_r-y-var_dump)
> Imprimir el valor de print_r() no es necesario con el constructor del lenguaje `echo`. Si el segundo parametro es true este se guardara en la variable donde se haya asignado
```php
print_r(array("hola", 85, 85.5));
# devuelve un formato legible para humanos
Array
(
    [0] => hola
    [1] => 85
    [2] => 85.5
)
var_dump(array("hola", 85, 85.5));
# es util más para la depuración de código
array(3) {
  [0] =>
  string(4) "hola"
  [1] =>
  int(85)
  [2] =>
  double(85.5)
}
```
> `print` y `echo` son constructores de lenguaje no son verdaderamente funciones [link](http://php.net/manual/es/function.echo.php)

