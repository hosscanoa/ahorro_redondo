<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = "usuarios";
    public $timestamps = false;

    public function estado()
    {
        return $this->belongsTo('App\Estado');
    }

    public function cuentas()
    {
        return $this->belongsToMany('App\Cuenta', 'usuarios_cuentas');
    }

}
