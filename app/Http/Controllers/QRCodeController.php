<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\View\View;
use PDF;
use Illuminate\Http\Request;

class QRCodeController extends Controller
{
//    public function generate($text)
//    {
//        $renderer = new \BaconQrCode\Renderer\Image\Png();
//        $renderer->setHeight(256);
//        $renderer->setWidth(256);
//        $writer = new \BaconQrCode\Writer($renderer);
//        $image_name = strtotime('now');
//        $writer->writeFile($text, 'public/qr_code/' . $image_name . '.png');
//        return view('code.qr', compact('image_name'));
//    }

    public function getPdf($text, $ticket_id)
    {
        $renderer = new \BaconQrCode\Renderer\Image\Png();
        $renderer->setHeight(256);
        $renderer->setWidth(256);
        $writer = new \BaconQrCode\Writer($renderer);
        $image_name = strtotime('now');
        $writer->writeFile($text, 'public/qr_code/' . $image_name . '.png');
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML(view('code.qr', compact('image_name', 'ticket_id'))->render());
        return $pdf->stream();
    }
}
