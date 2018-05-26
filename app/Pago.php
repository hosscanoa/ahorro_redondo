<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = "pagos";
    public $timestamps = false;

    public function servicio()
    {
        return $this->belongsTo('App\Servicio');
    }

    public function tipo()
    {
        return $this->belongsTo('App\Tipo');
    }

    public function cuenta()
    {
        return $this->belongsTo('App\Cuenta');
    }
}
