<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    public function transport()
    {
        return $this->hasOne('App\Transport','bookingId', 'id');
    }

}
