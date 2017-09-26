<?php

namespace App\Http\Controllers;

use App\Models\Tapakila;
use App\Models\Ticket;
use Illuminate\Http\Request;

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
        $id = $request->input('id_ilaina');
        $nombre = $request->input('number');
        $ticket = Ticket::create(['type' => $request->input('type'),
            'price' => $request->input('price'),
            'number' => $request->input('number'),
            'date_debut_vente' => new \DateTime($request->input('date_debut_vente')),
            'date_fin_vente' => new \DateTime($request->input('date_fin_vente')),
            'events_id' => $request->input('events_id')]);
        // Creation tapakila
        for ($i = 0; $i < $nombre; $i++) {
            //test code_unique tapakila
            $code_unique = $this->verifyCodeUnique($this->getUniqueCode(16));
            Tapakila::create([
                'code_unique' => $code_unique,
                'ticket_id' => $ticket->id
            ]);
        }
        return redirect(url('organisateur/evenement/' . $id . '/edit'));
    }
}
