<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menus;
use App\Models\Sous_menus;

class AproposController extends Controller
{
    public function faq(){
        $menus = Menus::orderBy('id', 'desc')->get();
        $sousmenus = Sous_menus::orderBy('name', 'asc')->get();
        return view('tapakila.faq', compact('menus', 'sousmenus','slides'));
    }
    public function apropos(){
        return view('tapakila.apropos');
    }
    public function contact(){
        return view('tapakila.contact');
    }
    public function term(){
        return view('tapakila.term');
    }
    public function achat(){
		$menus = Menus::orderBy('id', 'desc')->get();
        $sousmenus = Sous_menus::orderBy('name', 'asc')->get();
        return view('tapakila.achat',compact('menus', 'sousmenus'));
    }
    public function achatBillet(){
        return view('tapakila.acheterbillet');
    }
}
