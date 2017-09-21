<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Requests;
use File;

class AdminDetailsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listRoutes()
    {
        $routes = Route::getRoutes();
        $data = [
            'routes' => $routes
        ];

        return view('pages.admin.route-details', $data);
    }

    public function listPHPInfo()
    {
        return view('pages.admin.php-details');
    }

    public function message()
    {
        $alert = Alert::get();
        $alerts = Alert::where('vu', '=', '0')->get();
        return view('pages.admin.message', compact('alert', 'alerts'));
    }

    public function read_message($message_id)
    {
        $alerts = Alert::where('vu', '=', '0')->get();
        $alert = Alert::find($message_id);
        $alert->vu = true;
        $alert->save();
        return view('pages.admin.message-read', compact('alert', 'alerts'));
    }

}