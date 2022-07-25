<?php

Route::get("/", "NameController@NameAction");

// Crea las respectivas rutas para un controlador generado con artisan (CRUD)
// @see https://www.youtube.com/watch?v=E0Y09v05RAk&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=10
Route::resource("posts", "NameController");
