<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pointage extends Model
{
    protected $guarded = [];

    public function employe()
    {
        return $this->belongsTo('App\Employe');
    }
}
