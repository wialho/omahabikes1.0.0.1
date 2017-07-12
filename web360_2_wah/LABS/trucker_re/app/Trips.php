<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trips extends Model
{
    protected $fillable = [
        'name', 'miles', 'minutes', 'comment'
    ];
    public function trucker()
    {
        return $this -> belongsTo('App\Trucker');
    }
}
