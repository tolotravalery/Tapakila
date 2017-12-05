<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menus;
use App\Models\Sous_menus;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AproposController extends Controller
{
    public function faq()
    {
        $menus = Menus::orderBy('id', 'desc')->get();
        $sousmenus = Sous_menus::orderBy('name', 'asc')->get();
        return view('tapakila.faq', compact('menus', 'sousmenus', 'slides'));
    }

    public function apropos()
    {
        $menus = Menus::orderBy('id', 'desc')->get();
        $sousmenus = Sous_menus::orderBy('name', 'asc')->get();
        return view('tapakila.apropos', compact('menus', 'sousmenus'));
    }

    public function contact()
    {
        $menus = Menus::orderBy('id', 'desc')->get();
        $sousmenus = Sous_menus::orderBy('name', 'asc')->get();
        return view('tapakila.contact', compact('menus', 'sousmenus'));
    }

    public function vieprive()
    {
        $menus = Menus::orderBy('id', 'desc')->get();
        $sousmenus = Sous_menus::orderBy('name', 'asc')->get();

        return view('tapakila.vie-prive', compact('menus', 'sousmenus', 'slides'));
    }

    public function term()
    {
        $menus = Menus::orderBy('id', 'desc')->get();
        $sousmenus = Sous_menus::orderBy('name', 'asc')->get();
        return view('tapakila.term', compact('menus', 'sousmenus'));
    }

    public function achat()
    {
        $menus = Menus::orderBy('id', 'desc')->get();
        $sousmenus = Sous_menus::orderBy('name', 'asc')->get();
        return view('tapakila.achat', compact('menus', 'sousmenus'));
    }

    public function achatBillet()
    {
        $menus = Menus::orderBy('id', 'desc')->get();
        $sousmenus = Sous_menus::orderBy('name', 'asc')->get();
        return view('tapakila.acheterbillet', compact('menus', 'sousmenus'));
    }

    public function contactAction(Request $request){

        Mail::send('emails.contact',['message_corps' => $request->input('contacter_message'),
            'message_from_mail'=>$request->input('contacter_mail'),
            'message_from_name'=>$request->input('contacter_name')], function ($message) {
            $message->to('contact@leguichet.mg', 'Leguichet.mg')->subject('Leguichet contact');
        });
        session()->flash('message', "SUCCES! votre message a été bien envoyée");
        return redirect('leguichet/contact');
    }
}
