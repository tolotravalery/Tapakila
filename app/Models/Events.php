<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket');
    }
}
