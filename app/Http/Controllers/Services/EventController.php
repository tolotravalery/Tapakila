<?php
/**
 * Created by PhpStorm.
 * User: KOERA
 * Date: 16/11/2017
 * Time: 13:24
 */

namespace App\Http\Controllers\Services;


use App\Models\Events;
use Illuminate\Http\Request;

class EventController
{
    public function index(Request $request)
    {
        $event = Events::where('user_id', '=', $request->input('user_id'))->get();
        $data = array('list' => $event);
        return response()->json($data, 201);
    }
}