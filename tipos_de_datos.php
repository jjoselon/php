<?php
# http://php.net/manual/es/function.is-scalar.php

# Escalares 
# Son tipo escalar
  # integers, 
  echo is_scalar($var = 5) ? "$var es escalar" : "$var no es escalar"; // true
  # floats
  echo is_scalar($var = 5.5) ? "$var es escalar" : "$var no es escalar"; // true
  # strings
  echo is_scalar($var = "hh") ? "$var es escalar" : "$var no es escalar"; // true
  # booleans
  echo is_scalar($var = true) ? "$var es escalar" : "$var no es escalar"; // true
  
# No son de tipo escalar
  # arrays
  echo is_scalar($var = []) ? var_dump($var) :  "un array no es de tipo escalar"; //false
  # objectos
  echo is_scalar($var = new stdClass) ? var_dump($var) :  "un objeto no es de tipo escalar"; // false
  # null
  echo is_scalar($var = NULL) ? var_dump($var) :  "NULL no es de tipo escalar"; // false
