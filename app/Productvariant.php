<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productvariant extends Model
{
    //
    public function productquantity()
    {
        return $this->hasMany('App\Productquantities','var_id');
    }
    public function productvariations()
    {
        return $this->hasMany('App\Productvariantsoption','var_id');
    }

    
}
