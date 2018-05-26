<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = "servicios";
    public $timestamps = false;

    public function tipo()
    {
        return $this->belongsTo('App\Tipo');
    }


}
