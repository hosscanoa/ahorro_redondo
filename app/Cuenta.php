<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    protected $table = "cuentas";
    public $timestamps = false;

    public function banco()
    {
        return $this->belongsTo('App\Banco');
    }

    public function estado()
    {
        return $this->belongsTo('App\Estado');
    }

}
