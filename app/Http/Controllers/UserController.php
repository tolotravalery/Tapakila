<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use App\Models\Menus;
use App\Models\Sous_menus;
use App\Models\User;
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
        session()->keep(['niova']);
        $niova = session()->get('niova');
        //dd($huhu);
        $user = Auth::user();

        if ($user->isAdmin()) {
            $alert = Alert::where('vu', '=', '0')->get();
            return view('pages.admin.home', compact('alert'));

        }
        if ($user->hasRole('organisateur')) {
            $menus = Menus::orderBy('id', 'desc')->get();
            $sousmenus = Sous_menus::orderBy('name', 'asc')->get();
            $events_passe = $user->events()->where('date_fin_event', '<', date('Y-m-d'))->get();
            $events_futur = $user->events()->where('date_debut_envent', '>', date('Y-m-d'))->get();
            $achats = $user->tickets;
            return view('pages.user.home_organisateur')->with(compact('menus', 'sousmenus', 'events_passe', 'events_futur', 'achats', 'niova'));
        }
        if ($user->hasRole('user')) {
            $menus = Menus::orderBy('id', 'desc')->get();
            $sousmenus = Sous_menus::orderBy('name', 'asc')->get();

            $achats = $user->tickets;
            return view('pages.user.home')->with(compact('menus', 'sousmenus', 'achats', 'niova'));
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
    public function annuler($user_id,$id){
        $user=User::find($user_id);
        $ticket_to_delete = $user->tickets()->wherePivot('id', '=', $id)->get();
//        foreach ($ticket_to_delete as $t_u){
//            $t_u->pivot->delete();
//        }
//        dd($ticket_to_delete[0]->users()->sync([]));
        $user->tickets()->detach($ticket_to_delete[0]->id);
        return redirect(url('/home'));
    }

}