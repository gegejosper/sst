<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    public function customer()
    {
        return $this->belongsTO('App\User', 'userId', 'id');
    }
}
