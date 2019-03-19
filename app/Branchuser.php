<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branchuser extends Model
{
    //
    public function user()
    {
        return $this->belongsTO('App\User', 'userid', 'id');
    }
    public function branch()
    {
        return $this->belongsTO('App\Branch', 'branch_id', 'id');
    }
}
