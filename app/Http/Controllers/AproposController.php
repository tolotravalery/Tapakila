<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AproposController extends Controller
{
    public function faq(){
        return view('tapakila.faq');
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
        return view('tapakila.achat');
    }
    public function achatBillet(){
        return view('tapakila.acheterbillet');
    }
}
