<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skuproductvariantsoption extends Model
{
    //
    public function varoption()
    {
        return $this->belongsTO('App\Productvariantsoption', 'options_id', 'id');
    }
    public function variant()
    {
        return $this->belongsTO('App\Productvariant', 'var_id', 'id');
    }

    public function product()
    {
        return $this->belongsTO('App\Product', 'prod_id', 'id');
    }
}
