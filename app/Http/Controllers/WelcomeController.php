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
        //$events=Events::find(1)->sous_menus()->;
        //dd($events);
        return View('/welcome', compact('menus', 'sousmenus'));
    }

}
