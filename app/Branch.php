<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    //
    public function cashier()
    {
        return $this->belongsTo('App\User','cashier_id','id');
    }
    public function checker()
    {
        return $this->belongsTo('App\User','userid','id');
    }

    public function products()
    {
        return $this->hasMany('App\Productquantity', 'branch_id');
    }
}
