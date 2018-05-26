<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = "Servicios";

    public function tipo()
    {
        return $this->belongsTo('App\Tipo');
    }


}
