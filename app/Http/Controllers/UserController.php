<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use App\Models\Menus;
use App\Models\Sous_menus;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();

        if ($user->isAdmin()) {
            $alert = Alert::where('vu', '=', '0')->get();
            return view('pages.admin.home', compact('alert'));

        }
        if ($user->hasRole('organisateur')) {
            $menus = Menus::orderBy('id', 'desc')->get();
            $sousmenus = Sous_menus::orderBy('name', 'asc')->take(20)->get();
            $events_passe = $user->events()->where('date_fin_event', '<', date('Y-m-d H:i:s'))->get();
            $events_futur = $user->events()->where('date_debut_envent', '>', date('Y-m-d H:i:s'))->get();
            $achats = $user->tickets;
            return view('pages.user.home_organisateur')->with(compact('menus', 'sousmenus', 'events_passe', 'events_futur', 'achats'));
        }
        return view('pages.user.home');

    }

    public function editUser($userId)
    {
        try {
            $user = $this->getUserByUsername($userId);
        } catch (ModelNotFoundException $exception) {
            return view('pages.status')
                ->with('error', trans('profile.notYourProfile'))
                ->with('error_title', trans('profile.notYourProfileTitle'));
        }
        $themes = Theme::where('status', 1)
            ->orderBy('name', 'asc')
            ->get();
        $currentTheme = Theme::find($user->profile->theme_id);
        $data = [
            'user' => $user,
            'themes' => $themes,
            'currentTheme' => $currentTheme

        ];
        return view('profiles.edit')->with($data);
    }

}