<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cashierorder extends Model
{
    //
    public function item()
    {
        return $this->belongsTo('App\Productquantity', 'item_id', 'id');
    }
}
