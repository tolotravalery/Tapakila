<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slides extends Model
{
    protected $table = 'slideimage';

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'title',
        'image',
        'active',
    ];

}
