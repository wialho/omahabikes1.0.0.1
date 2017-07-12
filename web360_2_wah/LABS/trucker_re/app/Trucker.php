<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Trucker extends Model
{
    protected $fillable = [
        'name'
    ];

    public function trips()
    {
        return $this->hasMany('App\Trips');
    }

}
