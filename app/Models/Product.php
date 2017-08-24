<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = ['name', 'slug', 'description', 'price', 'image'];

    public function users()
    {
       return $this->belongsToMany('App\Models\User');
    }
}
