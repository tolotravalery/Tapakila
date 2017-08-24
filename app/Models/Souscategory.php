<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Souscategory extends Model
{
    protected $table = 'souscategories';

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'title',
        'category_id'
    ];

    public function events()
    {
        return $this->hasMany('App\Models\Event');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
