<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;

class DetailEventController extends Controller
{
    public function show($events_id)
    {
//        /**/->random(3)

        $interested = Events::where('id', '!=', $events_id)->where('publie', '=', 'true')->get();
        if ($interested->count() > 3) $interested = $interested->random(3);
        return view('events.detail', array('event' => Events::find($events_id), 'interested' => $interested));
    }
}
