<?php

namespace App\Http\Controllers;
use Auth;
use App\Data;
use Validator;
use Response;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Models\Menu;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $menus = Menu::all();

        return View('/pages.admin.listemenus', compact('menus'));

    }
    /*public function welcome()
    {

        $menus = Menu::all()->take(1)->get();

        return View('/welcome', compact('menus'));

    }*/

    protected $redirectTo = '/listemenus';

    protected function validator(array $data) {

        return Validator::make($data,
            [
                'title'  => 'required|max:255|unique:menus',
            ]
        );

    }
    protected function create(array $data) {

        $menu = Menu::create([
            'title'              => $data['title']
        ]);

        return $menu;

    }
    public function showMenuForm()
    {
        return view('pages.admin.createmenu');
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return view('pages.admin.createmenu');
    }


    /*-----------------*/



    public function edit($id)
    {

        $category = Category::findOrFail($id);

        $data = [
            'category'          => $category
        ];

        return view('pages.admin.edit-category')->with($data);
    }

    public function update(Request $request, $id)
    {

        $currentUser = Auth::user();
        $user        = User::find($id);
        $emailCheck  = ($request->input('email') != '') && ($request->input('email') != $user->email);
        $ipAddress   = new CaptureIpTrait;

        if ($emailCheck) {
            $validator = Validator::make($request->all(), [
                'name'      => 'required|max:255',
                'email'     => 'email|max:255|unique:users',
                'password'  => 'present|confirmed|min:6'
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'name'      => 'required|max:255',
                'password'  => 'nullable|confirmed|min:6'
            ]);
        }
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        } else {
            $user->name = $request->input('name');

            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');

            if ($emailCheck) {
                $user->email = $request->input('email');
            }

            if ($request->input('password') != null) {
                $user->password = bcrypt($request->input('password'));
            }

            $user->detachAllRoles();
            $user->attachRole($request->input('role'));
            //$user->activated = 1;

            $user->updated_ip_address = $ipAddress->getClientIp();

            $user->save();
            return back()->with('success', trans('usersmanagement.updateSuccess'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $currentUser = Auth::user();
        $user        = User::findOrFail($id);
        $ipAddress   = new CaptureIpTrait;

        if ($user->id != $currentUser->id) {

            $user->deleted_ip_address = $ipAddress->getClientIp();
            $user->save();
            $user->delete();
            return redirect('users')->with('success', trans('usersmanagement.deleteSuccess'));
        }
        return back()->with('error', trans('usersmanagement.deleteSelfError'));

    }



}