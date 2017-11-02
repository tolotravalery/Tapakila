<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use App\Models\Menus;
use App\Models\Sous_menus;
use App\Models\User;
use Auth;
use App\Data;
use Validator;
use Response;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Models\Events;
use Illuminate\Support\Facades\Crypt;

class EventController extends Controller
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

    public function verifyRole()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    protected function validator(array $data)
    {

        return Validator::make($data,
            [
                'title' => 'required|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]
        );

    }

    protected function create(array $data)
    {

        $event = Event::create([
            'title' => $data['title'],
            'sous_menus_id' => $data['sousmenu'],
            'image' => $data['image']
        ]);

        return $event;

    }

    public function showEventForm(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if (!$user->hasRole('organisateur')) {
            return redirect(url('errors/' . md5('event') . '/' . md5('403')));
        }
        $menus = Menus::orderBy('id', 'desc')->get();
        $sousmenus = Sous_menus::orderBy('id', 'desc')->get();
//        $event = Events::orderBy('id', 'desc')->take(1)->get();
        return view('pages.admin.createevent', compact('menus', 'sousmenus', 'event'));
    }

    public function listEvent()
    {
        $events = Events::all();
        $alert = Alert::where('vu', '=', '0')->get();
        return view('pages.admin.listeevent1', compact('events', 'alert'));
    }

    public function updatePublie(Request $request)
    {
        $ev = Events::find($request->input('id'));
        $rep = $request->input('active');
        if (strcmp("on", $rep) == 0) {
            $ev->publie = true;
        } else {
            $ev->publie = false;
        }
        $ev->save();
        return redirect(url('admin/listevent'));
    }

    public function updatePublieAll(Request $request)
    {
        $ev = Events::find($request->input('id'));
        $ev->publie = $request->input('active');
        $ev->save();
        return "update " . $request->input('id') . "to " . $request->input('active') . " finished";
    }

    public function edit($id)
    {
        $event = Events::findOrFail($id);
        $alert = Alert::where('vu', '=', '0')->get();
        $sousmenus=Sous_menus::all();
        return view('pages.admin.edit-event', compact('event', 'sousmenus', 'alert'));
    }

    public function update_website(Request $request)
    {
        $ev = Events::find(Crypt::decryptString($request->input('id')));
        $ev->siteweb = $request->input('slug');
        $image = $request->file('image');
        if ($image == null) {

        } else {
            $filename = $image->getClientOriginalExtension();
            $input['image'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $input['image']);
            $ev->image_background = $input['image'];
        }
        $ev->save();
        return redirect(url('organisateur/event/' . $ev->id . '/edit'));
    }

    public function store(Request $request)
    {

        $user = User::find(Auth::user()->id);
        if (!$user->hasRole('organisateur')) {
            return redirect(url('errors/' . md5('event') . '/' . md5('403')));
        }
        $huhu = $request->input('publie');
        $tmp = true;
        if (strcmp("true", $huhu) == 0) {
            $tmp = true;
        } else {
            $tmp = false;
        }

        //echo $request->input('publie');break;
        $this->validator($request->all())->validate();

        $image = $request->file('image');
        $filename = $image->getClientOriginalExtension();
        $input['image'] = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/img');
        $image->move($destinationPath, $input['image']);
        $titre = $request->input('title');
        $split = explode(" ", $titre);
        $titre = $split[0];
        $event = Events::create([
            'title' => $request->input('title'),
            'sous_menus_id' => $request->input('sousmenu'),
            'image' => $input['image'],
            'date_debut_envent' => new \DateTime($request->input('date_debut') . " " . $request->input('heure_debut')),
            'date_fin_event' => new \DateTime($request->input('date_fin') . " " . $request->input('heure_fin')),
            'additional_note' => $request->input('note'),
            'localisation_nom' => $request->input('localisation_nom'),
            'localisation_adresse' => $request->input('localisation_adresse'),
            'user_id' => Auth::user()->id,
            'publie_organisateur' => $tmp,
            'siteweb' => $titre,
            'additional_note_time' => $request->input('note_time'),
        ]);
        $message = 'Nouveau event ' . $event->title . ' (event id : ' . $event->id . ') ajouté par ' . Auth::user()->name . ' . Veuillez l\'activé';
        $alertAdmin = Alert::create([
            'message' => $message,
            'vu' => 0
        ]);

        $message = $request->input('message');
        session()->flash('message', $message);

        return redirect(url('organisateur/event/' . $event->id . '/edit'))->with(compact('message'));;
    }
    public function updateadmin(Request $request)
    {
        $event = Events::find($request->input('id'));
        $event->title = $request->input('title');
        $event->sous_menus_id = $request->input('sousmenu');
        $event->date_debut_envent = new \DateTime($request->input('date_debut') . " " . $request->input('heure_debut'));
        $event->date_fin_event = new \DateTime($request->input('date_fin') . " " . $request->input('heure_fin'));
        $event->additional_note = $request->input('description');
        $event->localisation_nom = $request->input('localisation_nom');
        $event->localisation_adresse = $request->input('localisation_adresse');
        $event->additional_note_time = $request->input('additional_note');
        $event->save();
        return redirect(url('admin/listevent'));
    }
    public function update(Request $request)
    {
        $code = Crypt::decryptString($request->input('id'));
        $event = Events::find($code);
        if ($event == null) {
            return redirect(url('errors/' . md5('event-update') . '/' . md5('500')));
        }
        $huhu = $request->input('publie');
        $tmp = true;
        if (strcmp("true", $huhu) == 0) {
            $tmp = true;
        } else {
            $tmp = false;
        }

        $image = $request->file('image');
        if ($image != null) {
            $filename = $image->getClientOriginalExtension();
            $input['image'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $input['image']);
            $event->image = $input['image'];
        }
        $titre = $request->input('title');
        $split = explode(" ", $titre);
        $titre = $split[0];
        $event->title = $request->input('title');
        $event->sous_menus_id = $request->input('sousmenu');
        $event->date_debut_envent = new \DateTime($request->input('date_debut') . " " . $request->input('heure_debut'));
        $event->date_fin_event = new \DateTime($request->input('date_fin') . " " . $request->input('heure_fin'));
        $event->additional_note = $request->input('note');
        $event->localisation_nom = $request->input('localisation_nom');
        $event->localisation_adresse = $request->input('localisation_adresse');
        $event->publie_organisateur = $tmp;
        $event->siteweb = $titre;
        $event->additional_note_time = $request->input('note_time');
        $event->save();
        return redirect(url('organisateur/event/' . $event->id . '/edit'));
    }

    public function question_secret(Request $req)
    {
        $code = Crypt::decryptString($req->input('events_id'));
        $event = Events::find($code);
        $event->question_secret = $req->input('question');
        $event->save();
        return redirect(url('organisateur/event/' . $event->id . '/edit'));
    }
  
    public function destroy($id)
    {
        $event = Events::find($id);
        $event->delete();

        $events=Events::all();
        $alert = Alert::where('vu', '=', '0')->get();
        /*return view('pages.admin.listeevent1', compact('events', 'alert'));*/
        return redirect(url('admin/listevent'));
    }
}