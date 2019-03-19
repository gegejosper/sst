<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributionrecord extends Model
{
    //
    public function product()
    {
        return $this->belongsTO('App\Product', 'productid', 'id');
    }
    public function branch()
    {
        return $this->belongsTO('App\Branch', 'branchid', 'id');
    }

    public function skuoption()
    {
        return $this->belongsTO('App\Skuproductvariantsoption', 'skuid', 'id');
    }
}
