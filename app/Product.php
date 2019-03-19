<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    // public function orders()
    // {
    //     return $this->belongsToMany('App\Reqorder')->withPivot('price', 'item_id','quantity', 'req_id');
    // }
    public function quantity()
    {
        return $this->hasMany('App\Productquantity', 'prod_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }
    public function productquantities()
    {
        return $this->hasMany('App\Productquantity','prod_id');
    }

    public function distributionrecord()
    {
        return $this->hasMany('App\Distributionrecord','productid');
    }

    public function productvariation()
    {
        return $this->hasMany('App\Productvariant','prod_id');
    }

    public function productskus()
    {
        return $this->hasMany('App\Skuproductvariantsoption','prod_id');
    }

}
