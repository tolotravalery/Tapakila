<?php

namespace App\Http\Controllers;

use App\Models\Souscategory;
use Auth;
use App\Data;
use Validator;
use Response;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Models\Category;

class SouscategoryController extends Controller
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
        $souscategories = Souscategory::all();

        return View('/pages.admin.listesouscategories', compact('souscategories'));

    }


    protected $redirectTo = '/listsouscategories';

    protected function validator(array $data)
    {

        return Validator::make($data,
            [
                'title' => 'required|max:255|unique:souscategories',
            ]
        );

    }

    public function showSouscategoryForm()
    {
        $categories = Category::all();
        return view('pages.admin.createsouscategory',compact('categories'));
    }

    protected function create(array $data)
    {

        $souscategory = SousCategory::create([
            'title' => $data['title'],
            'category_id'        => $data['category']
        ]);

        return $souscategory;

    }

    public function store(Request $request)
    {
        $categories = Category::all();
        $this->validator($request->all())->validate();

       // event(new Registered($user = $this->create($request->all())));
        $souscategory = SousCategory::create([
            'title' => $request->input('title'),
            'category_id'  => $request->input('category')
        ]);


        return view('pages.admin.createsouscategory',compact('categories'));
    }

}