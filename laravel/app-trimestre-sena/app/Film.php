<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $table = 'film';
    protected $primaryKey = 'film_id';
    public $timestamps = false;

    /**
     * m:1
     * Muchas peliculas pertenecen a un idioma
     */
    public function idioma() {
        return $this->belongsTo('App\Language',# modelo
                                'language_id', # llave primaria
                                'language_id'
                            );
        # idioma()->first();
    }

    /**
     * m:m
     */
    public function actores() {
        return $this->belongsToMany('App\Actor',
                                    'film_actor', # pelicula_actor NOMBRE TABLA INTERMEDIA
                                    'film_id', # llave forenea de film
                                    'actor_id' # llave foranea de actor
                                    );
        # actores()->getresults();
    }
}
