<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Conner\Tagging\Taggable;


class Productquantity extends Model
{
    //
    use Taggable;

    public function product()
    {
        return $this->belongsTO('App\Product', 'prod_id', 'id');
    }
    public function dailysale()
    {
        return $this->belongsTo('App\Dailyquantitysale','productid', 'id')->orderBy('id', 'asc')->latest();
    }
    public function packageitem()
    {
        return $this->belongsTO('App\Packageitem', 'prod_id', 'productid');
    }
    public function category()
    {
        return $this->belongsTO('App\Category', 'category_id', 'id');
    }

    public function branch()
    {
        return $this->belongsTO('App\Branch', 'branch_id', 'id');
    }
    public function variation()
    {
        return $this->belongsTO('App\Productvariantsoption', 'options_id', 'id');
    }
    public function productvariants()
    {
        return $this->belongsTO('App\Productvariantsoption', 'options_id', 'id');
    }
    
    public function purchaserecords()
    {
        return $this->hasMany('App\Productquantities','prod_id');
    }
    
    // public function tag()
    // {
    //     return $this->belongsTO('App\Tagging_tag', 'branch_id', 'id');
    // }
}
