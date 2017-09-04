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

    public function showEventForm()
    {
        $menus = Menus::orderBy('id', 'desc')->take(8)->get();
        $sousmenus = Sous_menus::orderBy('id', 'desc')->take(20)->get();
        //$events=Events::find(1)->sous_menus()->;
        //dd($events);
        //return View('/welcome', compact('menus', 'sousmenus'));
        return view('pages.admin.createevent', compact('menus', 'sousmenus'));
    }
    public function listEvent()
    {
        $events = Events::all();
        return view('pages.admin.listeevent1', compact( 'events'));
    }
    public function updatePublie(Request $request){
        $ev=Events::find($request->input('id'));
        //$ev->publie=$request->input('active');
        //$this->listEvent();
        $rep=$request->input('active');
        if(strcmp("on",$rep)==0){
            $ev->publie=true;
        }
        else{
            $ev->publie=false;
        }
        $ev->save();
        $events = Events::all();
        return view('pages.admin.listeevent1', compact( 'events'));

    }

    public function store(Request $request)
    {
        $menus = Menus::orderBy('id', 'desc')->take(8)->get();
        $sousmenus = Sous_menus::orderBy('id', 'desc')->take(20)->get();
        $this->validator($request->all())->validate();


        $image = $request->file('image');
        $filename = $image->getClientOriginalExtension();
        $input['image'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/img');
        $image->move($destinationPath, $input['image']);


        $format = 'Y-m-d H:i:s';
       // $datestring=$request->input('date_debut')." ".$request->input('heure_debut');
       // dd($datestring);

       // $daty= new \DateTime($datestring);

       // $daty1= new \DateTime($datestring);


        $event = Events::create([
            'title' => $request->input('title'),
            'sous_menus_id' => $request->input('sousmenu'),
            'image' => $input['image'],
            'date_debut_envent' =>  new \DateTime($request->input('date_debut')." ".$request->input('heure_debut')),
            'date_fin_event' => new \DateTime($request->input('date_fin')." ".$request->input('heure_fin')),
            'additional_note' => $request->input('note'),
            'localisation_nom' => $request->input('localisation_nom'),
            'localisation_adresse' => $request->input('localisation_adresse'),
            'users_id' => Auth::user()->id
        ]);

        return view('pages.admin.createevent', compact('menus', 'sousmenus'));
        //return response()->json(array('path' => $path), 200);
    }
}