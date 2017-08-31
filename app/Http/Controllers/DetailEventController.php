<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Menus;
use App\Models\Sous_menus;
use Illuminate\Http\Request;

class DetailEventController extends Controller
{
    public function show($events_id)
    {
        $menus = Menus::orderBy('id', 'desc')->get();
        $sousmenus = Sous_menus::orderBy('id', 'desc')->get();
        $date_now = date('Y-m-d H:i:s');
        $interested = Events::where('id', '!=', $events_id)->where('publie', '=', '1')->where('date_debut_envent', '>', $date_now)->get();;
        if ($interested->count() > 3) $interested = $interested->random(3);
        return view('events.detail', array('event' => Events::find($events_id), 'interested' => $interested, 'menus' => $menus, 'sousmenus' => $sousmenus));
    }

    public function listEventMenu($menu)
    {
        $menu_id = Menus::find($menu);
        $menus = Menus::orderBy('id', 'desc')->get();
        $sousmenus = Sous_menus::orderBy('id', 'desc')->get();
        return view('events.list')->with(array('menu_event' => $menu_id, 'menus' => $menus, 'sousmenus' => $sousmenus));
    }

    public function listEventSousMenu($sous_menu)
    {
        $sous_menu_id = Sous_menus::find($sous_menu);
        $menus = Menus::orderBy('id', 'desc')->get();
        $sousmenus = Sous_menus::orderBy('id', 'desc')->get();
        return view('events.list1')->with(array('sous_menu_event' => $sous_menu_id, 'menus' => $menus, 'sousmenus' => $sousmenus));
    }
}
