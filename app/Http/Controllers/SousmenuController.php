<?php

namespace App\Http\Controllers;


use App\Models\Alert;
use App\Models\Sous_menus;
use Auth;
use App\Data;
use Validator;
use Response;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Models\Menus;

class SousmenuController extends Controller
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

        //  $categories = Category::all();
        $sousmenus = Sous_menus::all();
        $alert = Alert::where('vu', '=', '0')->get();
        return View('/pages.admin.listesousmenus', compact('sousmenus', 'alert'));

    }


    protected $redirectTo = '/listesousmenus';

    protected function validator(array $data)
    {

        return Validator::make($data,
            [
                'name' => 'required|max:255|unique:sous_menus',
            ]
        );

    }

    public function update(Request $request, $id)
    {
        $sousmenu = Sous_menus::find($id);
        //dd($sousmenu);
        $sousmenu->name = $request->input('name');
        $sousmenu->menus_id = $request->input('menu');
        $sousmenu->save();
        //return View('/pages.admin.listesousmenus', compact('sousmenus', 'alert'));
        return redirect(url('admin/sousmenus/'));
    }

    public function edit($id)
    {
        $alert = Alert::where('vu', '=', '0')->get();
        $sousmenu = Sous_menus::findOrFail($id);
        $menus = Menus::all();
        /* $data = [
             'sousmenu' => $sousmenu
         ];*/

        return view('pages.admin.edit-sousmenu', compact('sousmenu', 'alert', 'menus'));
    }

    public function showSousmenuForm()
    {
        $menus = Menus::all();
        $alert = Alert::where('vu', '=', '0')->get();
        return view('pages.admin.createsousmenu', compact('menus', 'alert'));
    }

    protected function create(array $data)
    {

        $sousmenu = Sous_menus::create([
            'name' => $data['name'],
            'menus_id' => $data['menu']
        ]);

        return $sousmenu;

    }

    public function store(Request $request)
    {
        $menus = Menus::all();
        $this->validator($request->all())->validate();

        $sousmenu = Sous_menus::create([
            'name' => $request->input('name'),
            'menus_id' => $request->input('menu')
        ]);
        $alert = Alert::where('vu', '=', '0')->get();

        return view('pages.admin.createsousmenu', compact('menus', 'alert'));
    }

    public function destroy($id)
    {
        $sousmenu = Sous_menus::find($id);
        $sousmenu->delete();

        // return View('/pages.admin.listesousmenus', compact('sousmenus'));
        $menus = Menus::all();
        $alert = Alert::where('vu', '=', '0')->get();
        return view('pages.admin.createsousmenu', compact('menus', 'alert'));

    }
}