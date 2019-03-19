<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dealerspackageorder extends Model
{
    public function dealer()
    {
        return $this->belongsTO('App\Dealer', 'dealerid', 'id');
    }
    public function package()
    {
        return $this->belongsTO('App\Package', 'packageid', 'id');
    }
    public function user()
    {
        return $this->belongsTO('App\User', 'cashier_id', 'id');
    }
}
