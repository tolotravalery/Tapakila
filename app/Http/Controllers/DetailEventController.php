<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;

class DetailEventController extends Controller
{
    public function show($events_id)
    {
        return view('events.detail', array('event' => Events::find($events_id)));
    }
}
