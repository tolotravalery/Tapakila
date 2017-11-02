<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use Auth;
use App\Data;
use Validator;
use Response;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Models\Menus;
use App\Models\Sous_menus;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $menus = Menus::all();
        $alert = Alert::where('vu', '=', '0')->get();
        return View('/pages.admin.listemenus', compact('menus', 'alert'));

    }

    /*public function welcome()
    {

        $menus = Menu::all()->take(1)->get();

        return View('/welcome', compact('menus'));

    }*/

    protected $redirectTo = '/listemenus';

    protected function validator(array $data)
    {

        return Validator::make($data,
            [
                'name' => 'required|max:255|unique:menus',
            ]
        );

    }

    protected function create(array $data)
    {

        $menu = Menus::create([
            'name' => $data['name']
        ]);

        return $menu;

    }

    public function showMenuForm()
    {
        $alert = Alert::where('vu', '=', '0')->get();
        return view('pages.admin.createmenu', compact('alert'));
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        $alert = Alert::where('vu', '=', '0')->get();
        return view('pages.admin.createmenu', compact('alert'));
    }


    /*-----------------*/


    public function edit($id)
    {
        $alert = Alert::where('vu', '=', '0')->get();
        $menu = Menus::findOrFail($id);
        return view('pages.admin.edit-menu',compact('alert','menu'));
    }

    public function update(Request $request, $id)
    {
        $menu = Menus::find($id);
        $menu->name = $request->input('name');
        $menu->save();
        return redirect(url('admin/menus/'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        /*$currentUser = Auth::user();
        $user        = User::findOrFail($id);
        $ipAddress   = new CaptureIpTrait;

        if ($user->id != $currentUser->id) {

            $user->deleted_ip_address = $ipAddress->getClientIp();
            $user->save();
            $user->delete();
            return redirect('users')->with('success', trans('usersmanagement.deleteSuccess'));
        }
        return back()->with('error', trans('usersmanagement.deleteSelfError'));
        */

        $sousmenus = Sous_menus::all()->where('menus_id', $id);
        $count = $sousmenus->count();
        //dd($sousmenus);break;
        $i = 0;
        if ($count == 0) {
        } else {
            for ($i = 0; $i < $count; $i++) {
                //echo $sousmenus[$i]->name;
                $sousmenus[$i]->delete();
            }
        }
        $menu = Menus::find($id);
        // dd($menu);break;
        $menu->delete();
        //dd($sousmenus);
        //return back()->with('error', trans('usersmanagement.deleteSelfError'));
        return view('pages.admin.createmenu');

    }


}