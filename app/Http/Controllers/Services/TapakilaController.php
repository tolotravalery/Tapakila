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
        $tapakila = Tapakila::where('ticket_id', '=', $request->input('ticket_id'))
            ->where('vendu', '=', 1)
            ->where('code_unique', "=", $request->input('code_unique'))
            ->where('scanne', '=', 0);
        if ($tapakila != null) {
            $data = array('code' => 'success');
            return response()->json($data, 201);
        } else {
            $data = array('code' => 'failed');
            return response()->json($data, 201);
        }
    }

}