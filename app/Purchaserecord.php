<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchaserecord extends Model
{
    //
    public function productquantity()
    {
        return $this->belongsTO('App\Productquantity', 'prodquantityid', 'id');
    }
    public function product()
    {
        return $this->belongsTO('App\Product', 'prodquantityid', 'id');
    }
    public function skuoption()
    {
        return $this->belongsTO('App\Skuproductvariantsoption', 'skuid', 'id');
    }
}
