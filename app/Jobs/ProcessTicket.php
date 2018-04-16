<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Tapakila;
use PDF;
use Illuminate\Support\Facades\App;
class ProcessTicket implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    private $ticket;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($ticket)
    {
        $this->ticket = $ticket;
    }


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


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
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
        $type = pathinfo(public_path('/qr_code/' . $name . '.png'), PATHINFO_EXTENSION);
        $imageQr = file_get_contents(public_path('/qr_code/' . $name . '.png'));
        $imageQrBase64 = 'data:image/' . $type . ';base64,' . base64_encode($imageQr);
        $eventPdf = $this->ticket->events()->get()[0];
        $eventImagePath = public_path('/img/'.$eventPdf->image);
        $typeImageEvent = pathinfo($eventImagePath, PATHINFO_EXTENSION);
        $imageEvent = file_get_contents($eventImagePath);
        $imageEventBase64 = 'data:image/' . $typeImageEvent . ';base64,' . base64_encode($imageEvent);
        $logopath=public_path('/img/logo.png');
        $logotype=pathinfo($logopath,PATHINFO_EXTENSION);
        $logoimage=file_get_contents($logopath);
        $logoBase64='data:image/'.$logotype.';base64,'.base64_encode($logoimage);
        $price=$this->ticket->price;
        $pdf->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
            ->loadHTML(view('pdf.ticket')->with(array('image' => $imageQrBase64,'eventImage'=>$imageEventBase64,
                'event' => $eventPdf,'price'=>$price,'logo'=>$logoBase64))->render());
        $pdf->setPaper('a5', 'portrait')->save($PdfDestinationPath);
        Tapakila::create([
            'code_unique' => $code_unique,
            'ticket_id' => $this->ticket->id,
            'qr_code' => $name . '.png',
            'pdf' => $name . '.pdf'
        ]);
    }
}
