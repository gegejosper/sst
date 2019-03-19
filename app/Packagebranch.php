<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Packagebranch extends Model
{
    //
    public function package()
    {
        return $this->belongsTO('App\Package', 'packageid', 'id');
    }
}
