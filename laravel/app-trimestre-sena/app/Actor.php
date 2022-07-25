<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $table = 'actor';
    protected $primaryKey = 'actor_id';
    public $timestamps = false;

    /**
     * m:m
     */
    public function peliculas() {
        return $this->belongsToMany('App\Film',
                                    'film_actor', # pelicula_actor NOMBRE TABLA INTERMEDIA
                                    'actor_id', # llave forenea de actor
                                    'film_id' # llave foranea de film
                                    );
        # peliculas()->getresults();
    }
}
