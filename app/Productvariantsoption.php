<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productvariantsoption extends Model
{
    //
    public function variationoption()
    {
        return $this->belongsTO('App\Productvariant', 'var_id', 'id');
    }
}
