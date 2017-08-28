<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = "ticket";
    public function events()
    {
        return $this->belongsTo('App\Models\Events');
    }
}
