<?php
/**
 * Created by PhpStorm.
 * User: KOERA
 * Date: 16/11/2017
 * Time: 12:51
 */

namespace App\Http\Controllers\Services;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request)
    {

        Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'),'isOrganisateur'=>1]);
        $data = null;
        if (Auth::check()) {
            $data = array("users" => Auth::user());
            Auth::logout();
        }
        return response()->json($data, 201);
    }


}