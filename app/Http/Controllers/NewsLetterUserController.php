<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsLetterUserController extends Controller
{

    public function store(Request $request)
    {
        $user_id = $request->input('users');
        $checked = $request->input('checked');
        $news_letter = Newsletter::findOrFail(1);
        if($checked){
            $news_letter->users()->sync(array($user_id=>array('activated'=>'1')));
        }else{
            $news_letter->users()->sync([]);
        }
        return redirect(url('profile/'.$user_id.'/edit'));
    }

}
