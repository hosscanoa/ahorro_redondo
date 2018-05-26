<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deseo extends Model
{
    protected $table = "Deseos";

    public function estado()
    {
        return $this->belongsTo('App\Estado');
    }
}
