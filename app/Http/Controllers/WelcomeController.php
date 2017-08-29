<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menus;
use App\Models\Sousmenu;

class WelcomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $menus = Menus::orderBy('id','desc')->take(8)->get();
        $sousmenus= Sousmenu::orderBy('id','desc')->take(20)->get();

        return View('/welcome', compact('menus','sousmenus'));
    }

}
