<?php

namespace App\Http\Controllers;
use App\Models\Newsletter;
use App\Models\Ticket;
use App\Models\Alert;
use App\Models\Menus;
use App\Models\Sous_menus;
use App\Models\User;
use Auth;
use App\Data;
use Illuminate\Support\Facades\Session;
use Validator;
use Response;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Models\Events;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;


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
            return redirect(url('/home'));
           // return redirect(url('errors/' . md5('event') . '/' . md5('403')));
        }
        $menus = Menus::orderBy('id', 'desc')->get();
        $sousmenus = Sous_menus::orderBy('id', 'desc')->get();
//        $event = Events::orderBy('id', 'desc')->take(1)->get();
        return view('pages.admin.createevent', compact('menus', 'sousmenus', 'event'));
    }
    public function showAjouterTicket($id){

        $alert = Alert::where('vu', '=', '0')->get();
        $event = Events::find($id);
        return view('pages.admin.ajouter_ticket', compact('event', 'alert'));
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
        $old_publie = $ev->publie;
        if($old_publie == $request->input('active')){
            // send mail for all members of news letter
            $newsLetter = Newsletter::findOrFail(1);
            foreach ($newsLetter->users as $user){
                Session::put('news_letter_user_email',$user->emai);
                Session::put('news_letter_user_name',$user->name);
                Mail::send('emails.newsletter', ['user' => Auth::user(), 'event' => $ev], function ($message) {
                    $message->to(Session::get('news_letter_user_email'), Session::get('news_letter_user_name'));
                    $message->cc('reservations@leguichet.mg','Leguichet.mg')->subject('Leguichet new event');
                });
            }
        }
        $ev->publie = $request->input('active');
        $ev->save();
        return "update " . $request->input('id') . " to " . $request->input('active') . " finished";
    }

    public function edit_admin($id)
    {
        $event = Events::findOrFail($id);
        $alert = Alert::where('vu', '=', '0')->get();
        $sousmenus = Sous_menus::all();
        return view('pages.admin.edit-event', compact('event', 'sousmenus', 'alert'));
    }

    public function edit($id)
    {
        $user = User::find(Auth::user()->id);
        if (!$user->hasRole('organisateur')) {
            return redirect(url('errors/' . md5('event') . '/' . md5('403')));
        }
        $menus = Menus::all();
        $sousmenus = Sous_menus::all();
        $event = Events::find($id);
        if ($event->user_id != Auth::user()->id) {
            //return redirect(url('errors/' . md5('event-form-update') . '/' . md5('500')));
            return redirect(url('/home'));
        }
        return view('events.edit', compact('event', 'menus', 'sousmenus'));
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

        $message = " Opération réussie";
        session()->flash('message', $message);
        // Send mail to organisateur
        Mail::send('emails.ajoutevenement', ['user' => Auth::user(), 'event' => $event], function ($message) {
            $message->to(Auth::user()->email, Auth::user()->name)->subject('Leguichet');
            $message->cc('reservations@leguichet.mg','Leguichet.mg')->subject('Leguichet new event');
        });
        return redirect(url('organisateur/event/' . $event->id . '/edit'))->with(compact('message'));
    }

    public function updateadmin(Request $request)
    {

        $event = Events::find($request->input('id'));
        $event->title = $request->input('title');
        $event->sous_menus_id = $request->input('sousmenu');
        //dd($request->input('date_debut') . " " . $request->input('heure_debut'));
        $dated = explode('/', $request->input('date_debut'));
        $datede = $dated[1] . "/" . $dated[0] . "/" . $dated[2];

        $datef = explode('/', $request->input('date_fin'));
        $datefi = $datef[1] . "/" . $datef[0] . "/" . $datef[2];

        $event->date_debut_envent = new \DateTime($datede . " " . $request->input('heure_debut'));
        //dd($event->date_debut_envent);
        $event->date_fin_event = new \DateTime($datefi . " " . $request->input('heure_fin'));
        $event->additional_note = $request->input('description');
        $event->localisation_nom = $request->input('localisation_nom');
        $event->localisation_adresse = $request->input('localisation_adresse');
        $event->additional_note_time = $request->input('additional_note');
        $tmp = $request->input('publie_organisateur');
        $tmp1 = $request->input('publie');
        $value = true;
        $value1 = true;
        if (!empty($tmp)) {
            $value = true;
        } else {
            $value = false;
        }
        if (!empty($tmp1)) {
            $value1 = true;
        } else {
            $value1 = false;
        }
        $image = $request->file('image');
        if ($image != null) {
            $filename = $image->getClientOriginalExtension();
            $input['image'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $input['image']);
            $event->image = $input['image'];
        }
        $event->publie_organisateur = $value;
        $event->publie = $value1;
        $event->save();

        $message = " Opération réussie";
        session()->flash('message', $message);

        Mail::send('emails.modifierevenement', ['user' => Auth::user(), 'event' => $event], function ($message) {
            $message->to(Auth::user()->email, Auth::user()->name)->subject('Leguichet');
            $message->cc('reservations@leguichet.mg','Leguichet.mg')->subject('Leguichet update event from Admin');
        });

        return redirect(url('admin/listevent'))->with(compact('message'));;
    }


    public function create_admin()
    {
        $alert = Alert::where('vu', '=', '0')->get();
        $sousmenus = Sous_menus::all();
        return view('pages.admin.create_event', compact('alert', 'sousmenus'));
    }

    public function stroreAdmin(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $isPublie = $request->input('publie');
        $isPubAdmin = $request->input('publie_admin');
        $publie = true;
        $publieOrganisateur = true;
        if (!empty($isPublie)) {
            $publie = true;
        } else {
            $publie = false;
        }
        if (!empty($isPubAdmin)) {
            $publieOrganisateur = true;
        } else {
            $publieOrganisateur = false;
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
            'publie_organisateur' => $publieOrganisateur,
            'siteweb' => $titre,
            'additional_note_time' => $request->input('note_time'),
            'publie' => $publie,
        ]);
        // Send mail to organisateur
        Mail::send('emails.ajoutevenement', ['user' => Auth::user(), 'event' => $event], function ($message) {
            $message->to(Auth::user()->email, Auth::user()->name)->subject('Leguichet');
            $message->cc('reservations@leguichet.mg','Leguichet.mg')->subject('Leguichet new event from Admin');
        });
        return redirect(url('admin/events/update/' . $event->id));
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
        $message = " Opération réussie";
        session()->flash('message', $message);
        session()->flash('page', "details");
        Mail::send('emails.modifierevenement', ['user' => Auth::user(), 'event' => $event], function ($message) {
            $message->to(Auth::user()->email, Auth::user()->name)->subject('Leguichet');
            $message->cc('reservations@leguichet.mg','Leguichet.mg')->subject('Leguichet update event');
        });
        return redirect(url('organisateur/event/' . $event->id . '/edit'))->with(compact('message'));;
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

        $events = Events::all();
        $alert = Alert::where('vu', '=', '0')->get();
        /*return view('pages.admin.listeevent1', compact('events', 'alert'));*/

        return redirect(url('admin/listevent'));
    }

    public function rapport_vue($id){
        session()->flash('page', "rapport");
        return redirect(url('organisateur/event/' . $id . '/edit'));;
    }
}