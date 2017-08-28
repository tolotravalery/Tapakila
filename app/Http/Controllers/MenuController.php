<?php

namespace App\Http\Controllers;
use Auth;
use App\Data;
use Validator;
use Response;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Models\Menu;
use App\Models\Sousmenu;

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

        $menu = Menu::findOrFail($id);

        $data = [
            'menu'          => $menu
        ];

        return view('pages.admin.edit-menu')->with($data);
    }

    public function update(Request $request, $id)
    {
        $menu= Menu::find($id);
        $menu->title = $request->input('title');
        $menu->save();
        //return back()->with('success', trans('usersmanagement.updateSuccess'));
        return view('pages.admin.createmenu');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
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

        $sousmenus = Sousmenu::all()->where('menu_id',$id);
        $count=Sousmenu::count();
        $i=0;
        for ($i=0;$i<$count;$i++){
            //echo $sousmenus[$i]->title;
            $sousmenus[$i]->delete();
        }
        $menu= Menu::find($id);
        $menu->delete();
        //dd($sousmenus);
        //return back()->with('error', trans('usersmanagement.deleteSelfError'));
        return view('pages.admin.createmenu');

    }



}