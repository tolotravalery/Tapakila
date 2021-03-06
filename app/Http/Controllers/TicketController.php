<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Tapakila;
use App\Models\Ticket;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\Alert;
use PDF;
use App\Jobs\ProcessTicket;

class TicketController extends Controller
{

    public function store(Request $request)
    {
        $event_id = Crypt::decryptString($request->input('id'));
        $event = Events::find($event_id);
        $nombre = $request->input('number');
        $rep = $request->input('isValable');
        $ticket = Ticket::create(['type' => $request->input('type'),
            'price' => $request->input('price'),
            'number' => $request->input('number'),
            'date_debut_vente' => new \DateTime($request->input('date_debut_vente')),
            'date_fin_vente' => new \DateTime($request->input('date_fin_vente')),
            'description' => $request->input('description')]);
        if ($rep == null) {
            $date = $request->input('date');
            $ticket->events()->attach(array($event_id => array('date' => $date)));
        } else if (strcmp("on", $rep) == 0) {
            $interval = new \DateInterval('P1D');
            $daterange = new \DatePeriod(\Carbon\Carbon::parse($event->date_debut_envent), $interval, \Carbon\Carbon::parse($event->date_fin_event));
            foreach ($daterange as $d) {
                $ticket->events()->attach(array($event_id => array('date' => $d)));
            }
        } else {
            $ticket->events()->attach(array($event_id => array('date' => $event->date_debut_envent)));
        }
        // Creation tapakila
        for ($i = 0; $i < $nombre; $i++) {
            ProcessTicket::dispatch($ticket);
        }
        $message = " Opération réussie, Ticket ajouté avec succès";
        session()->flash('message', $message);
        session()->flash('page', "tickets");
        return redirect(url('organisateur/evenement/' . $event->id . '/edit'))->with(compact('message'));
    }

    public function storeTicket(Request $request)
    {
        //dd("eto");
        $event_id = Crypt::decryptString($request->input('id'));
        $event = Events::find($event_id);
        $nombre = $request->input('number');
        $rep = $request->input('isValable');
        $ticket = Ticket::create(['type' => $request->input('type'),
            'price' => $request->input('price'),
            'number' => $request->input('number'),
            'date_debut_vente' => new \DateTime($request->input('date_debut_vente')),
            'date_fin_vente' => new \DateTime($request->input('date_fin_vente')),
            'description' => $request->input('description')]);
        if ($rep == null) {
            $date = $request->input('date_ticket');
            $ticket->events()->attach(array($event_id => array('date' => $date)));
        } else if (strcmp("on", $rep) == 0) {
            $interval = new \DateInterval('P1D');
            $daterange = new \DatePeriod(\Carbon\Carbon::parse($event->date_debut_envent), $interval, \Carbon\Carbon::parse($event->date_fin_event));
            foreach ($daterange as $d) {
                $ticket->events()->attach(array($event_id => array('date' => $d)));
            }
        } else {
            $ticket->events()->attach(array($event_id => array('date' => $event->date_debut_envent)));
        }
        // Creation tapakila
        for ($i = 0; $i < $nombre; $i++) {
            ProcessTicket::dispatch($ticket);
        }
        return redirect(url('admin/listevent'));
    }

    public function delete($id, $event_id)
    {
        $event = Events::findOrFail($event_id);
        if ($event->user_id == Auth::user()->id) {
            $ticket = Ticket::findOrFail($id);
            $ticket->delete();
        }
        $message = " Opération réussie, Ticket supprimé avec succès";
        session()->flash('message', $message);
        session()->flash('page', "tickets");
        return redirect(url('organisateur/evenement/' . $event->id . '/edit'))->with(compact('message'));
    }

    public function delete_admin($id, $event_id)
    {
        //dd("test");
        $event = Events::findOrFail($event_id);
        if ($event->user_id == Auth::user()->id) {
            $ticket = Ticket::findOrFail($id);
            $ticket->delete();
        }
        $message = " Opération réussie, Ticket supprimé avec succès";
        session()->flash('message', $message);
        session()->flash('page', "tickets");
        return redirect(url('admin/ajouterTicket/' . $event->id))->with(compact('message'));
    }

    public function edit_admin($id, $event_id)
    {
        $ticket = Ticket::findOrFail($id);
        $event = Events::findOrFail($event_id);
        $alert = Alert::where('vu', '=', '0')->get();
        return view('pages.admin.edit-ticket', compact('ticket', 'alert', 'event'));
    }

    public function update_admin(Request $request)
    {
        $code = Crypt::decryptString($request->input('id_event'));
        $event = Events::findOrFail($code);

        $tic = Ticket::find(Crypt::decryptString($request->input('id')));
        $tic_number_avant = $tic->number;
        $tic->number = $request->input('number');
        $tic->type = $request->input('type');
        $tic->price = $request->input('price');
        $tic->date_debut_vente = new \DateTime($request->input('date_debut_vente'));
        $tic->date_fin_vente = new \DateTime($request->input('date_fin_vente'));
        $tic->description = $request->input('description');
        $difference = $tic->number - $tic_number_avant;
        if ($difference > 0) {
            for ($i = 0; $i < $difference; $i++) {
                ProcessTicket::dispatch($tic);
            }
            $tic->save();
        } else if ($difference < 0) {
            $nombre = $difference * (-1);//moins nombre
            //dd($nombre);
            //$tap=Tapakila::find($tic->id,'ticket_id')->limit(intval($nombre));
            $tap = Tapakila::get()->where('ticket_id', '=', $tic->id)->take(intval($nombre));
            //dd($tap);
            foreach ($tap as $tapakila) {
                $tapakila->delete();
            }

            $tic->save();
        }

        return redirect(url('admin/ajouterTicket/' . $event->id))->with(compact('message'));
    }

    /**
     * 
     * Get instant the number of Tapakila genered
     * 
     * @var int
     * 
     * @return int
     */
    public function getInstant($ticket_id){
        return Ticket::FindOrFail($ticket_id)->tapakila()->count();
    }
}
