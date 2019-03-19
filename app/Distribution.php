<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distribution extends Model
{
    //
    public function branch()
    {
        return $this->belongsTO('App\Branch', 'branchid', 'id');
    }
}
