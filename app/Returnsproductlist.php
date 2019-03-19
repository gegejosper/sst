<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Returnsproductlist extends Model
{
    //
    public function branch()
    {
        return $this->belongsTO('App\Branch', 'branchid', 'id');
    }
}
