<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PayEvent extends Model
{
    protected $table = 'payevent';
    protected $fillable = ['reference_transaction', 'date_payment','events_id'];
    protected $guarded = ['id'];


    public function event()
    {
    	return $this->belongsTo('App\Models\Events');
    }
}
