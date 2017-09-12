<?php

namespace App\Http\Controllers;

use App\Models\Menus;
use App\Models\Sous_menus;
use Auth;
use App\Data;
use Validator;
use Response;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Models\Events;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    protected function validator(array $data)
    {

        return Validator::make($data,
            [
                'title' => 'required|max:255|unique:events',
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
        $menus = Menus::orderBy('id', 'desc')->take(8)->get();
        $sousmenus = Sous_menus::orderBy('id', 'desc')->take(20)->get();
        $event = Events::orderBy('id', 'desc')->take(1)->get();
        return view('pages.admin.createevent', compact('menus', 'sousmenus', 'event'));
    }

    public function listEvent()
    {
        $events = Events::all();
        return view('pages.admin.listeevent1', compact('events'));
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
//        dd($request->input());
//        dd($ev);
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
    public function edit($id){
        $menus = Menus::orderBy('id', 'desc')->take(8)->get();
        $sousmenus = Sous_menus::orderBy('id', 'desc')->take(20)->get();
        $event = Events::find($id);
        return view('events.edit', compact( 'event','menus','sousmenus'));
    }
    public function update_website(Request $request){
        $ev = Events::find($request->input('id'));
        $ev->siteweb=$request->input('slug');
        $image = $request->file('image');
        if ($image==null){

        } else {
            $filename = $image->getClientOriginalExtension();
            $input['image'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $input['image']);
            $ev->image_background = $input['image'];
        }
        $ev->save();
        return redirect(url('organisateur/evenement/'.$ev->id.'/edit'));
    }
    public function store(Request $request)
    {
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
        $titre=$request->input('title');
        $split= explode(" ",$titre);
        $titre=$split[0];

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
        ]);

       // dd($event->id);
        return redirect(url('organisateur/evenement/'.$event->id.'/edit'));
    }
}