<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alert;
use Illuminate\Support\Facades\Redirect;

class AlertController extends Controller
{
//    public function getAlert()

	public function clearAll(){
		$alerts = Alert::where('vu', '=', '0')->get();
		foreach ($alerts as $a) {
			$a->vu = 1;
			$a->save();
		}
		return Redirect::back();
	}
}
