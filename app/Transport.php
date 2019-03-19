<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    //
    public function booking()
    {
        return $this->belongsTo('App\Booking','bookingId', 'id');
    }

}
