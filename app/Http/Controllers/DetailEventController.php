<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Menus;
use App\Models\Sous_menus;

class DetailEventController extends Controller
{
    public function show($events_id)
    {
        $menus = Menus::orderBy('id', 'desc')->get();
        $sousmenus = Sous_menus::orderBy('name', 'asc')->take(20)->get();
        $date_now = date('Y-m-d H:i:s');
        $interested = Events::where('id', '!=', $events_id)->where('publie', '=', '1')->where('date_debut_envent', '>', $date_now)->get();;
        if ($interested->count() > 3) $interested = $interested->random(3);
        return view('events.detail', array('event' => Events::find($events_id), 'interested' => $interested, 'menus' => $menus, 'sousmenus' => $sousmenus));
    }

    public function show_par_name($event_name)
    {
        $menus = Menus::orderBy('id', 'desc')->get();
        $sousmenus = Sous_menus::orderBy('name', 'asc')->take(20)->get();
        $date_now = date('Y-m-d H:i:s');
        $events = Events::where('siteweb', 'like', '%' . $event_name . '%')->where('publie', '=', '1')->where('date_debut_envent', '>', $date_now)->get();
        $event = $events[0];
        //dd($event->id);
        $interested = Events::where('id', '!=', $event->id)->where('publie', '=', '1')->where('date_debut_envent', '>', $date_now)->get();;;
        if ($interested->count() > 3) $interested = $interested->random(3);
        return view('events.detail', array('event' => $event, 'interested' => $interested, 'menus' => $menus, 'sousmenus' => $sousmenus));
    }

    public function listEventMenu($menu)
    {
        $menu_id = Menus::find($menu);
        $menus = Menus::orderBy('id', 'desc')->get();
        $sousmenus = Sous_menus::orderBy('name', 'asc')->take(20)->get();
        return view('events.list')->with(array('menu_event' => $menu_id, 'menus' => $menus, 'sousmenus' => $sousmenus));
    }

    public function listEventSousMenu($sous_menu_name, $sous_menu)
    {
        $sous_menu_id = Sous_menus::find($sous_menu);
        $menus = Menus::orderBy('id', 'desc')->get();
        $sousmenus = Sous_menus::orderBy('name', 'asc')->take(20)->get();
        $date_now = date('Y-m-d H:i:s');
        $events = Events::where('sous_menus_id', '=', $sous_menu)->where('publie', '=', '1')->where('date_debut_envent', '>', $date_now)->get();
        return view('events.list1')->with(array('sous_menu_event' => $sous_menu_id, 'menus' => $menus, 'sousmenus' => $sousmenus, 'events' => $events));
    }
}
