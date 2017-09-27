<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function store(Request $request)
    {
        $event_id = $request->input('id_ilaina');
        $event = Events::find($event_id);
        if (strcmp("on", $request->input('isValable')) == 0) {

        }
        Ticket::create(['type' => $request->input('type'),
            'price' => $request->input('price'),
            'number' => $request->input('number'),
            'date_debut_vente' => new \DateTime($request->input('date_debut_vente')),
            'date_fin_vente' => new \DateTime($request->input('date_fin_vente')),
            'events_id' => $request->input('events_id')]);
        //return redirect('event');
        return redirect(url('organisateur/evenement/' . $event_id . '/edit'));
    }
}
