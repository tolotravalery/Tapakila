<?php
/**
 * Created by PhpStorm.
 * User: Trustylabs
 * Date: 19/12/2017
 * Time: 11:45
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class TicketUser extends Model
{
    protected $table = 'ticket_user';

    protected $fillable = ['number', 'date_achat', 'ticket_id', 'user_id', 'payement_mode_id', 'achat_reference', 'status_payement', 'ticket_pdf'];
    public $timestamps = false;

    public function tapakila()
    {
        return $this->hasMany('App\Models\Tapakila');
    }
}