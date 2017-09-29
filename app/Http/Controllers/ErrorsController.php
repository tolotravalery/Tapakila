<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorsController extends Controller
{
    public function show(Request $req, $from, $code)
    {
        $code = $code;
        $from = $from;
        $message = '';
        switch ($code) {
            case md5('403') :
                $message = 'Vous n\'êtes pas autorisé à cette fonctionalité';
            case md5('500') :
                $message = 'Objet non trouvé!';
        }
        if ($from == md5('event')) $message .= ' Vous devriez changer votre profil en organisateur';
        if ($from == md5('event-update')) $message .= 'Nous somme désolé, il y a une erreur interne se produit';
        if ($from == md5('event-form-update')) $message .= 'Nous somme désolé, il y a une erreur interne se produit : Vous n\'êtes pas autorisé à modifier un évènement des autres';

        return view('errors.personalise')->with('message', $message);
    }
}
