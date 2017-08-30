<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sous_menus extends Model
{
    protected $table = 'sous_menus';

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'name',
        'menus_id'
    ];


    public function menus()
    {
        return $this->belongsTo('App\Models\Menus');
    }

    public function events()
    {
        return $this->hasMany('App\Models\Events');
    }
}
