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
        $data = array('list' => $event->tickets);
        return response()->json($data, 201);
    }
}