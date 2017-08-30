<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    protected $table = 'menus';

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'name'
    ];

    public function sousmenus()
    {
        return $this->hasMany('App\Models\Sousmenu');
    }
}
