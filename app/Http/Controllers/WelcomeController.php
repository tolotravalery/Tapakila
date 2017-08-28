<?php
namespace App\Http\Controllers;
use App\Models\Menu;

use App\Models\Sousmenu;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $menus = Menu::orderBy('id','desc')->take(8)->get();
        $sousmenus= Sousmenu::orderBy('id','desc')->take(20)->get();

        return View('/welcome', compact('menus','sousmenus'));
    }

}
