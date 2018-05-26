<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deseo extends Model
{
    protected $table = "ceseos";
    public $timestamps = false;

    public function estado()
    {
        return $this->belongsTo('App\Estado');
    }
}
