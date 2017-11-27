<?php
/**
 * Created by PhpStorm.
 * User: KOERA
 * Date: 16/11/2017
 * Time: 14:50
 */

namespace App\Http\Controllers\Services;


use App\Http\Controllers\Controller;
use App\Models\Tapakila;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TapakilaController extends Controller
{
    public function scan(Request $request)
    {
        $tapakila = Tapakila::where('code_unique', '=', $request->input('code_unique'))->get();
        if ($tapakila->count() > 0) {
            $ticket = Ticket::findOrFail($request->input('ticket_id'));
            // si tapakila est dans l billet (VIP ou NON...)
            if ($tapakila[0]->ticket_id == $ticket->id) {
                // si la date de ticket est valide
                foreach ($ticket->events as $e) {
                    if ($e->pivot->date == date('Y-m-d')) {
                        if ($tapakila[0]->scanne == false) {
                            $data = array('code' => 'success', 'message' => 'Ce ticket est valide');
                            return response()->json($data, 201);
                        } else {
                            $data = array('code' => 'failed', 'message' => 'Ce ticket est déjà scannée');
                            return response()->json($data, 201);
                        }
                    }
                }
                $data = array('code' => 'failed', 'message' => 'Ce ticket n\'est dans la date d\'aujourd\'hui');
                return response()->json($data, 201);
            } else {
                $data = array('code' => 'failed', 'message' => 'Ce ticket n\'est pas dans le ticket de type ' . $ticket->type);

                return response()->json($data, 201);
            }
        } else {
            $data = array('code' => 'failed', 'message' => 'Ce ticket n\'est pas dans notre base de donnée');
            return response()->json($data, 201);
        }
    }

    public function load(Request $request)
    {
        $tapakila = Tapakila::where('ticket_id', '=', $request->input('ticket_id'))->get();
        $data = array('list' => $tapakila);
        return response()->json($data, 201);
    }

}