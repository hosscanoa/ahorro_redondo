<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    protected $table = "bancos";
    public $timestamps = false;

    public function  servicios()
    {
        return $this->belongsToMany('App\Servicio','bancos_servicios');
    }
}
