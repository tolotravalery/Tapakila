<?php

namespace App\Http\Controllers;

use App\Models\TicketUser;
use Illuminate\Http\Request;
use App\Models\Alert;

class AdminAchatController extends Controller
{
    public function index(){
        $achats = TicketUser::all();
        $alert = Alert::where('vu', '=', '0')->get();
        return view('pages.admin.achat',compact('achats','alert'));
    }
}
