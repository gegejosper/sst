<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function user()
    {
        return $this->belongsTO('App\User', 'cashier_id', 'id');
    }
}
