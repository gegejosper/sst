<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Packageorder extends Model
{
    //
    public function package()
    {
        return $this->belongsTO('App\Package', 'packageid', 'id');
    }
    public function branch()
    {
        return $this->belongsTO('App\Branch', 'branchid', 'id');
    }
    public function customer()
    {
        return $this->belongsTO('App\Customer', 'customerid', 'id');
    }
    public function user()
    {
        return $this->belongsTO('App\User', 'cashier_id', 'id');
    }
}
