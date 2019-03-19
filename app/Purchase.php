<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    //
    public function cashier()
    {
        return $this->belongsTo('App\User','cashier_id','id');
    }
}
