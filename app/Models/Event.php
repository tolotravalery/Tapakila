<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'title',
        'content',
        'date_heure_debut_event',
        'date_heure_fin_event',
        'date_debut_vente_billet',
        'date_fin_vente_billet',
        'localisation nom',
        'localisation adresse',
        'nbre',
        'image',
        'publie',

    ];



    public function souscategory(){
        return $this->belongsTo('App\Models\Souscategory');
    }
}
