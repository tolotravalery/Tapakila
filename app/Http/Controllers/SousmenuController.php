<?php

namespace App\Http\Controllers;


use App\Models\Sousmenu;
use Auth;
use App\Data;
use Validator;
use Response;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Models\Menu;

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
                'title' => 'required|max:255|unique:sousmenus',
            ]
        );

    }

    public function showSousmenuForm()
    {
        $menus = Menu::all();
        return view('pages.admin.createsousmenu',compact('menus'));
    }

    protected function create(array $data)
    {

        $sousmenu = Sousmenu::create([
            'title' => $data['title'],
            'category_id'        => $data['category']
        ]);

        return $sousmenu;

    }

    public function store(Request $request)
    {
        $menus = Menu::all();
        $this->validator($request->all())->validate();

        $sousmenu = Sousmenu::create([
            'title' => $request->input('title'),
            'menu_id'  => $request->input('menu')
        ]);


        return view('pages.admin.createsousmenu',compact('menus'));
    }

}