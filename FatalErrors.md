> FastCGI sent in stderr: "PHP message: PHP Fatal error:  Allowed memory size of 134217728 bytes exhausted (tried to allocate 2101248 bytes) in file.php on line 159

Establecer un valor mas alto en el parámetro `memory_limit` en el archivo php.ini (`pico /etc/php/7.3/fpm/php.ini`) e.g 4G
[http://php.net/memory-limit](http://php.net/memory-limit)

Luego reiniciar fpm `sudo systemctl restart php7.3-fpm.service`
