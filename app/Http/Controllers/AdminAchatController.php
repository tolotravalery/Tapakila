<?php

namespace App\Http\Controllers;

use App\Models\TicketUser;
use Illuminate\Http\Request;

class AdminAchatController extends Controller
{
    public function index(){
        $achats = TicketUser::all();
        return view('pages.admin.achat',compact('achats'));
    }
}
