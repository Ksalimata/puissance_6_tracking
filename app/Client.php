<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    
    protected $guarded = [];

    public function sites()
    {
        return $this->hasMany('App\Site');
    }

}
