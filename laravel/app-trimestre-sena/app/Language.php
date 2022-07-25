<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'language';
    protected $primaryKey = 'language_id';
    public $timestamps = false;

    /**
     * Relación hasMany()
     * Idioma tiene muchas peliculas 1:m
     */
    public function movies() {
        return $this->hasMany('App\Film', # Modelo asociado
                              'language_id', # Clave primaria
                              'language_id' # Clave foranea
                            )->getresults();
    }
}
