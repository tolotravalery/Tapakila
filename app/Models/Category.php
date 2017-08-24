<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'title',
    ];

    public function souscategories(){
        return $this->hasMany('App\Models\Souscategory');
    }

}
