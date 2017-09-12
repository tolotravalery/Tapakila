<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Menus;
use App\Models\Sous_menus;
use Illuminate\Http\Request;

class RechercheController extends Controller
{
    public function find(Request $req)
    {
        $queries = $req->input('query');
        $events = Events::where('title', 'like', '%' . $queries . '%')->orWhere('additional_note', 'like', '%' . $queries . '%')
            ->orWhere('localisation_nom', 'like', '%' . $queries . '%')
            ->orWhere('localisation_adresse', 'like', '%' . $queries . '%')
            ->where('publie','=','true')
            ->where('date_debut_envent', '>', date('Y-m-d H:i:s'))
            ->get();
        $menus = Menus::orderBy('id', 'desc')->take(8)->get();
        $sousmenus = Sous_menus::orderBy('name', 'asc')->take(20)->get();
        return view('find.result', compact('menus', 'sousmenus'))->with('events', $events)->with('queries', $queries);
    }
}
