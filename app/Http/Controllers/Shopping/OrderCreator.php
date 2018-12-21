<?php

namespace App\Http\Controllers\Shopping;

use App\Models\Payement_mode;
use App\Models\Ticket;
use App\Models\TicketUser;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderCreator{


    /**
     * @var string
     */
    private $reference;

    /**
     * @var string
     */
    private $typePayment;

    /**
     * @var int
     */
    private $user;


    public function __construct($user,$achatReference,$typePayment)
    {
        $this->reference = $achatReference;
        $this->typePayment = $typePayment;
        $this->user = $user;
    }

    public function createOrder(){
        $tic = array();
        $data = array();
        $j = 0;
        foreach (Cart::content() as $item) {
            $ticket = Ticket::findOrFail($item->id);
            $date = date('Y-m-d H:i:s');
            $nombre = $item->qty;
            $ticket_user = TicketUser::create([
                'number' => $item->qty,
                'date_achat' => $date,
                'ticket_id' => $ticket->id,
                'user_id' => $this->user,
                'payement_mode_id' => Payement_mode::where('slug', '=', $this->typePayment)->get()[0]->id,
                'achat_reference' => $this->reference,
                'status_payment' => 'PROCESSING'
            ]);
            $tic[$j] = $ticket;
            $tap = array();
            for ($i = 0; $i < $nombre; $i++) {
                $tapakila = $ticket->tapakila()->where('vendu', '=', '0')->get()->random(1)[0];
                $tapakila->vendu = 1;
                $ticket->number = $ticket->number - 1;
                $tapakila->ticket_user()->associate($ticket_user);
                $tapakila->save();
                $tap[$i] = $tapakila;
            }
            $data[$j] = array('ticket' => $tic[$j], 'tapakila' => $tap);
            $ticket->save();
            $j++;
        }

        return $data;
    }
}