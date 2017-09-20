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
        $events = Events::where('title', 'like', '%' . $queries . '%')
            ->orWhere('additional_note', 'like', '%' . $queries . '%')
            ->orWhere('localisation_nom', 'like', '%' . $queries . '%')
            ->orWhere('localisation_adresse', 'like', '%' . $queries . '%')
            ->get();
        $event = $events->where('publie', '=', '1')
            ->where('date_debut_envent', '>', date('Y-m-d H:i:s'));
        $menus = Menus::orderBy('id', 'desc')->take(8)->get();
        $sousmenus = Sous_menus::orderBy('name', 'asc')->take(20)->get();
        return view('find.result', compact('menus', 'sousmenus'))->with('events', $event)->with('queries', $queries);
    }

    public function filtered(Request $req)
    {
        $queries = $req->input('query');
        $sous_categories = $req->input('categorie');
        $events = Events::where('title', 'like', '%' . $queries . '%')
            ->orWhere('additional_note', 'like', '%' . $queries . '%')
            ->orWhere('localisation_nom', 'like', '%' . $queries . '%')
            ->orWhere('localisation_adresse', 'like', '%' . $queries . '%')
            ->get();
        $event = $events->where('publie', '=', '1')
            ->where('date_debut_envent', '>', date('Y-m-d H:i:s'));
        if ($sous_categories)
            $event = $event->whereIn('sous_menus_id', $sous_categories, false);
        $menus = Menus::orderBy('id', 'desc')->take(8)->get();
        $sousmenus = Sous_menus::orderBy('name', 'asc')->take(20)->get();
        return view('find.result', compact('menus', 'sousmenus'))->with('events', $event)->with('queries', $queries);
    }
}
