<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Menus;
use App\Models\Sous_menus;
use Illuminate\Http\Request;

class DetailEventController extends Controller
{
    public function show($category_name,$events_date_title_id)
    {
        explode("_",$events_date_title_id)[2]  != null ? $events_id = explode("_",$events_date_title_id)[2] : $events_id =1 ;
        if (Events::findOrFail($events_id) == null) {
            return redirect(url('errors/' . md5('event-detail') . '/' . md5('500')));
        }
        $menus = Menus::orderBy('id', 'desc')->get();
        $sousmenus = Sous_menus::orderBy('name', 'asc')->get();
        $date_now = date('Y-m-d H:i:s');
        $interested = Events::where('id', '!=', $events_id)->where('publie', '=', '1')->where('date_debut_envent', '>', $date_now)->get();;
        if ($interested->count() > 3) $interested = $interested->random(3);
        return view('events.detail', array('event' => Events::find($events_id), 'interested' => $interested, 'menus' => $menus, 'sousmenus' => $sousmenus));
    }

    public function show_par_name($event_name)
    {
        $menus = Menus::orderBy('id', 'desc')->get();
        $sousmenus = Sous_menus::orderBy('name', 'asc')->get();
        $date_now = date('Y-m-d H:i:s');
        $events = Events::where('siteweb', 'like', '%' . $event_name . '%')->where('publie', '=', '1')->where('date_debut_envent', '>', $date_now)->get();
        $event = $events[0];
        $interested = Events::where('id', '!=', $event->id)->where('publie', '=', '1')->where('date_debut_envent', '>', $date_now)->get();;;
        if ($interested->count() > 3) $interested = $interested->random(3);
        return view('events.detail', array('event' => $event, 'interested' => $interested, 'menus' => $menus, 'sousmenus' => $sousmenus));
    }

    public function listEventMenu($menu)
    {
        if (Menus::where('name',$menu)->first() == null) {
            return redirect(url('errors/' . md5('event-detail') . '/' . md5('500')));
        }
        $menu_id = Menus::where('name',$menu)->first();
        $menus = Menus::orderBy('id', 'desc')->get();
        $sousmenus = Sous_menus::orderBy('name', 'asc')->get();
        return view('events.list')->with(array('menu_event' => $menu_id, 'menus' => $menus, 'sousmenus' => $sousmenus));
    }

    public function listEventSousMenu(Request $req,$sous_menu)
    {
        if (Sous_menus::where('name',$sous_menu)->first() == null) {
            return redirect(url('errors/' . md5('event-detail') . '/' . md5('500')));
        }
        $debut = 1;
        $end = 9;
        $page = 0;
        if ($req->input('page') != null) {
            $page = $req->input('page');
        }
        if ($page <= 0) {
            $debut = 0;
            $end = 9;
            $page = 0;
        } else {
            $end = $end * $page;
            $debut = ($end - 9);
        }
        $sous_menu_id = Sous_menus::where('name',$sous_menu)->first();
        $menus = Menus::orderBy('id', 'desc')->get();
        $sousmenus = Sous_menus::orderBy('name', 'asc')->get();
        $date_now = date('Y-m-d H:i:s');
        $events = Events::where('sous_menus_id', '=', $sous_menu_id->id)
            ->where('publie', '=', '1')
            ->where('date_debut_envent', '>', $date_now)
            ->offset($debut)
            ->limit($end)
            ->get();
        return view('events.list1')->with(array('sous_menu_event' => $sous_menu_id, 'menus' => $menus,
            'sousmenus' => $sousmenus, 'events' => $events, 'page' => $page));
    }
}
