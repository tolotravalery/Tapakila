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

class TicketController extends Controller
{
    private function crypto_rand_secure($min, $max)
    {
        $range = $max - $min;
        if ($range < 1) return $min;
        $log = ceil(log($range, 2));
        $bytes = (int)($log / 8) + 1;
        $bits = (int)$log + 1;
        $filter = (int)(1 << $bits) - 1;
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter;
        } while ($rnd > $range);
        return $min + $rnd;
    }

    private function getUniqueCode($lenght)
    {
        $code = '';
        $codeAlphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $codeAlphabet .= 'abcdefghijklmnopqrstuvwxyz';
        $codeAlphabet .= '0123456789';
        $max = strlen($codeAlphabet);
        for ($i = 0; $i < $lenght; $i++) {
            $code .= $codeAlphabet[$this->crypto_rand_secure(0, $max - 1)];
        }
        return $code;
    }

    private function verifyCodeUnique($codeUnique)
    {
        if ((Tapakila::where('code_unique', '=', $codeUnique)->get()->count() == 0))
            return $codeUnique;
        else return $this->verifyCodeUnique($this->getUniqueCode(16));

    }

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
            //test code_unique tapakila
            $code_unique = $this->verifyCodeUnique($this->getUniqueCode(16));
            $renderer = new \BaconQrCode\Renderer\Image\Png();
            $renderer->setHeight(256);
            $renderer->setWidth(256);
            $writer = new \BaconQrCode\Writer($renderer);
            $name = strtotime('now') . '' . rand();
            $writer->writeFile($code_unique, 'public/qr_code/' . $name . '.png');
            // PDF Generator
            $PdfDestinationPath = public_path('/tickets/' . $name . '.pdf');
            $pdf = App::make('dompdf.wrapper');

            // event
            $eventPdf = $ticket->events()->get()[0];

            $pdf->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
                ->loadHTML(view('pdf.ticket')->with(array('image' => $name,'event'=>$eventPdf))->render());
            $pdf->setPaper('a5', 'portrait')->save($PdfDestinationPath);

            Tapakila::create([
                'code_unique' => $code_unique,
                'ticket_id' => $ticket->id,
                'qr_code' => $name . '.png',
                'pdf' => $name . '.pdf'
            ]);
        }
        $message = " Opération réussie, Ticket ajouté avec succès";
        session()->flash('message', $message);
        session()->flash('page', "tickets");
        return redirect(url('organisateur/event/' . $event->id . '/edit'))->with(compact('message'));
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
            //test code_unique tapakila
            $code_unique = $this->verifyCodeUnique($this->getUniqueCode(16));
            $renderer = new \BaconQrCode\Renderer\Image\Png();
            $renderer->setHeight(256);
            $renderer->setWidth(256);
            $writer = new \BaconQrCode\Writer($renderer);
            $name = strtotime('now') . '' . rand();
            $writer->writeFile($code_unique, 'public/qr_code/' . $name . '.png');
            // PDF Generator
            $PdfDestinationPath = public_path('/tickets/' . $name . '.pdf');
            $pdf = App::make('dompdf.wrapper');
            // event
            $eventPdf = $ticket->events()->get()[0];

            $pdf->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
                ->loadHTML(view('pdf.ticket')->with(array('image' => $name,'event'=>$eventPdf))->render());
            $pdf->setPaper('a5', 'portrait')->save($PdfDestinationPath);

            Tapakila::create([
                'code_unique' => $code_unique,
                'ticket_id' => $ticket->id,
                'qr_code' => $name . '.png',
                'pdf' => $name . '.pdf'
            ]);
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
        return redirect(url('organisateur/event/' . $event->id . '/edit'))->with(compact('message'));
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
                $code_unique = $this->verifyCodeUnique($this->getUniqueCode(16));
                Tapakila::create([
                    'code_unique' => $code_unique,
                    'ticket_id' => $tic->id
                ]);
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
}
