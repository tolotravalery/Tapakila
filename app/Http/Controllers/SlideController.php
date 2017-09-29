<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use Auth;
use App\Data;
use Validator;
use Response;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Models\Slides;

class SlideController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $slides = Slides::all();
        $alert = Alert::where('vu', '=', '0')->get();
        return View('/pages.admin.listeslide', compact('slides', 'alert'));

    }

    public function updateActive(Request $request)
    {
        $slide = Slides::find($request->input('id'));

        $rep = $request->input('active');
        if (strcmp("on", $rep) == 0) {
            $slide->active = true;
        } else {
            $slide->active = false;
        }
        $slide->save();
        return redirect(url('admin/slides'));
    }



    protected function validator(array $data)
    {

        return Validator::make($data,
            [
                'title' => 'required|max:50:slideimage',

            ]
        );

    }

    public function showSlideForm()
    {
        $alert = Alert::where('vu', '=', '0')->get();
        return view('pages.admin.createslide', compact('alert'));
    }

    public function store(Request $request)
    {

        $this->validator($request->all())->validate();

        $image = $request->file('image');
        $filename = $image->getClientOriginalExtension();
        $input['image'] = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/slide');
        $image->move($destinationPath, $input['image']);
        $name_image = $input['image'];

        $slide = Slides::create([
            'title' => $request->input('title'),
            'image' => $name_image,
            'active' => true,

        ]);
        return redirect(url('admin/slides'));
    }

}