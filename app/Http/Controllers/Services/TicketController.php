<?php
/**
 * Created by PhpStorm.
 * User: KOERA
 * Date: 16/11/2017
 * Time: 14:15
 */

namespace App\Http\Controllers\Services;


use App\Models\Events;
use Illuminate\Http\Request;

class TicketController
{
    public function index(Request $request)
    {
        $event = Events::find($request->input('event_id'));
//        $tic = array();
//        $id = 0;
//        $i = 0;
//        foreach ($event->tickets as $ticket) {
//            if ($ticket->id != $id) {
//                $id = $ticket->id;
//                $tic[$i] = $ticket;
//                $i++;
//            }
//        }
//        $data = array('list' => $tic);
//        return response()->json($data, 201);
        $data = array('list' => $event->tickets()->orderBy('id', 'desc')->get());
        return response()->json($data, 201);
    }
}