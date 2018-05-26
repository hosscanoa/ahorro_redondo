<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ahorro extends Model
{
    protected $table = "ahorro";
    public $timestamps = false;

    public function pago()
    {
        return $this->belongsTo('App\Pago');
    }
}
