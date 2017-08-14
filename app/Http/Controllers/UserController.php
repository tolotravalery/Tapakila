<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
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

        $user = Auth::user();

        if ($user->isAdmin()) {

            return view('pages.admin.home');

        }

        return view('pages.user.home');

    }

    public function editUser($userId)
    {
        try {
            $user = $this->getUserByUsername($userId);
        } catch (ModelNotFoundException $exception) {
            return view('pages.status')
                ->with('error', trans('profile.notYourProfile'))
                ->with('error_title', trans('profile.notYourProfileTitle'));
        }
        $themes = Theme::where('status', 1)
            ->orderBy('name', 'asc')
            ->get();
        $currentTheme = Theme::find($user->profile->theme_id);
        $data = [
            'user' => $user,
            'themes' => $themes,
            'currentTheme' => $currentTheme

        ];
        return view('profiles.edit')->with($data);
    }

}