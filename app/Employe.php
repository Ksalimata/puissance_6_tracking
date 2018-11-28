<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    protected $guarded = [];

    public function site()
    {
        return $this->belongsTo('App\Site');
    }
}
