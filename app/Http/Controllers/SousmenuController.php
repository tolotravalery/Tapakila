<?php

namespace App\Http\Controllers;


use App\Models\Sousmenu;
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
        $sousmenus = Sousmenu::all();

        return View('/pages.admin.listesousmenus', compact('sousmenus'));

    }


    protected $redirectTo = '/listesousmenus';

    protected function validator(array $data)
    {

        return Validator::make($data,
            [
                'name' => 'required|max:255|unique:sousmenus',
            ]
        );

    }

    public function showSousmenuForm()
    {
        $menus = Menus::all();
        return view('pages.admin.createsousmenu',compact('menus'));
    }

    protected function create(array $data)
    {

        $sousmenu = Sousmenu::create([
            'name' => $data['name'],
            'menus_id'        => $data['menu']
        ]);

        return $sousmenu;

    }

    public function store(Request $request)
    {
        $menus = Menus::all();
        $this->validator($request->all())->validate();

        $sousmenu = Sousmenu::create([
            'name' => $request->input('name'),
            'menus_id'  => $request->input('menu')
        ]);


        return view('pages.admin.createsousmenu',compact('menus'));
    }

    public function destroy($id)
    {
        $sousmenu= Sousmenu::find($id);
        $sousmenu->delete();

       // return View('/pages.admin.listesousmenus', compact('sousmenus'));
        $menus = Menus::all();
        return view('pages.admin.createsousmenu',compact('menus'));

    }
}