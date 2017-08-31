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
//        /**/->random(3)

        $interested = Events::where('id', '!=', $events_id)->where('publie', '=', '1')->get();
        if ($interested->count() > 3) $interested = $interested->random(3);
        return view('events.detail', array('event' => Events::find($events_id), 'interested' => $interested));
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
