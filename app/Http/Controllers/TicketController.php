<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function store(Request $request)
    {
        $id=$request->input('id_ilaina');
        //dd($id);
        Ticket::create(['type' => $request->input('type'),
            'price' => $request->input('price'),
            'number' => $request->input('number'),
            'date_debut_vente' => new \DateTime($request->input('date_debut_vente')),
            'date_fin_vente' => new \DateTime($request->input('date_fin_vente')),
            'events_id' => $request->input('events_id')]);
        //return redirect('event');
        return redirect(url('organisateur/evenement/'.$id.'/edit'));
    }
}
