<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Packageitem extends Model
{
    //
    public function product()
    {
        return $this->belongsTO('App\Product', 'productid', 'id');
    }
}
