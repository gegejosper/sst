<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    //
    public function packageorder()
    {
        return $this->hasMany('App\Dealerpackageorder', 'dealerid', 'dealerid');
    }
}
