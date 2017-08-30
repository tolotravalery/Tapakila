<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menus;
use App\Models\Sous_menus;
use App\Models\Events;

class WelcomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $menus = Menus::orderBy('id', 'desc')->take(8)->get();
        $sousmenus = Sous_menus::orderBy('id', 'desc')->take(20)->get();

        $eventspopulaire = Events::orderBy('id','desc')->take(3)->get();
       // dd($eventspopulaire[0]->sous_menus());
       /* if ($sousmenus->count() > 3){
            $count=$sousmenus->count();
            $menu_event = Sous_menus::get()->random(3);
        }


        else $menu_event = $sousmenus;*/


        return View('/welcome', compact('menus', 'sousmenus', 'events1', 'eventspopulaire'));
    }

}
