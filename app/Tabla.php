<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tabla extends Model
{
    protected $table = "tablas";
    public $timestamps = false;

    public function tipos()
    {
        return $this->belongsToMany('App\Tipo', 'tablas_tipos');
    }

    public function estados()
    {
        return $this->belongsToMany('App\Estado', 'tablas_estados');
    }
}
