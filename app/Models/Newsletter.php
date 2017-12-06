<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model{

    protected $table = 'news_letter';

    protected $fillable = ['name','actived'];

    public function users(){
        return $this->belongsToMany('App\Models\User')->withPivot('activated');
    }
}