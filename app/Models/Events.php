<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $table = 'events';

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'title',
        'sous_menus_id',
        'image',
        'date_debut_envent',
        'date_fin_event',
        'additional_note',
        'localisation_nom',
        'localisation_adresse',
        'publie_organisateur',
        'user_id',
        'publie',
        'siteweb',
        'image_background',
        'additional_note_time',
        'question_secret'
    ];

    public function tickets()
    {
        return $this->belongsToMany('App\Models\Ticket')->withPivot('date');
    }

    public function sous_menus()
    {
        return $this->belongsTo('App\Models\Sous_menus');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function payevents(){
        return $this->hasMany('App\Models\PayEvent');
    }

    //public function
}
