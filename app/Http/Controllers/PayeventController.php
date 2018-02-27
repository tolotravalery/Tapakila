<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alert;
use App\Models\PayEvent;
use App\Models\Events;
class PayeventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alert = Alert::where('vu', '=', '0')->get();
        $payevent = PayEvent::All();
        return view('pages.admin.payevent',compact('alert','payevent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alert = Alert::where('vu', '=', '0')->get();
        $events = Events::All();
        return view('pages.admin.payevent-create',compact('alert','events'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = Events::findOrFail($request->input('event'));
        PayEvent::create([
            'reference_transaction' => $request->input('transaction'),
            'date_payment' => new \DateTime($request->input('date_payment')),
            'events_id' => $event->id,
        ]);
        return redirect(url('/admin/payment/create'))->with('success', 'Insertion réussie');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
