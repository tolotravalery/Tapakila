<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = "ticket";

    protected $fillable = ['type', 'price', 'number', 'date_debut_vente', 'date_fin_vente', 'events_id', 'description'];
    public $timestamps = false;

    public function events()
    {
        return $this->belongsToMany('App\Models\Events')->withPivot('date');
    }

    public function payement_modes()
    {
        return $this->belongsToMany('App\Models\Payement_mode');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    public function tapakila()
    {
        return $this->hasMany('App\Models\Tapakila');
    }

}
