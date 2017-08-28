<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sousmenu extends Model
{
    protected $table = 'sousmenus';

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'title',
        'menu_id'
    ];


    public function menu()
    {
        return $this->belongsTo('App\Models\Menu');
    }
}
