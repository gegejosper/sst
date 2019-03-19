<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function user()
    {
        return $this->belongsTO('App\User', 'userId', 'id');
    }
}
