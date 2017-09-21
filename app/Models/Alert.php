<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $table = 'alerts';
    protected $fillable = [
        'message',
        'vu'
    ];
    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
