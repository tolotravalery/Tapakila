<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Social;
use App\Models\User;
use App\Traits\CaptureIpTrait;
use Facebook\Facebook;
use Illuminate\Http\Request;
use jeremykenedy\LaravelRoles\Models\Role;
use Illuminate\Support\Facades\Input;

class FacebookController extends Controller
{
    public function getPage()
    {
        return view('fblogin_test');
    }

    public function postData(Facebook $fb, Request $request)
    {
        if (Input::get('denied') != '') {

            return redirect()->to('login')
                ->with('status', 'danger')
                ->with('message', trans('socials.denied'));
        }
        $access_token = $request->input('access_token');
        $fb->setDefaultAccessToken($access_token);
        $fields = "id,cover,name,first_name,last_name,age_range,link,gender,locale,picture,timezone,updated_time,verified,email";
        $fb_user = $fb->get('/me?fields=' . $fields)->getGraphUser();
        $userCheck = User::where('facebook_id', '=', $fb_user['id'])->first();
        if (isset($fb_user['email'])) {
            $email = $fb_user['email'];
        } else {
            $email = 'missing' . str_random(10) . '@test.com';
        }
        if (empty($userCheck)) {
            $ipAddress = new CaptureIpTrait();
            $socialData = new Social;
            $profile = new Profile();
            $role = Role::where('slug', '=', 'user')->first();
            $user = User::create([
                'facebook_id' => $fb_user['id'],
                'profile_avatar' => $fb_user['picture']['url'],
                'name' => $fb_user['name'],
                'first_name' => $fb_user['first_name'],
                'last_name' => $fb_user['last_name'],
                'email' => $email,
                'password' => bcrypt(str_random(40)),
                'token' => str_random(64),
                'activated' => true,
                'signup_sm_ip_address' => $ipAddress->getClientIp(),

            ]);
            $user->attachRole($role);
            $user->profile()->save($profile);
            $user->save();
            $user->profile->save();
            auth()->login($user, true);
            return redirect('home')->with('success', trans('socials.registerSuccess'));
        } else {
            auth()->login($userCheck, true);
            return redirect('home')->with('success', trans('socials.registerSuccess'));
        }
    }
}