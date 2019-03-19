<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reqorder extends Model
{
    //
    public function product()
    {
        return $this->belongsTO('App\Productquantity', 'item_id', 'id');
    }

//     public function products()
// {
//     return $this->belongsToMany('App\Product')->withPivot('price', 'item_id','quantity', 'req_id');
// }

}