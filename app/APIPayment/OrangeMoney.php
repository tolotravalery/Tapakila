<?php

/**
 * Created by PhpStorm.
 * User: KOERA
 * Date: 14/12/2017
 * Time: 08:58
 */

namespace App\APIPayment;

class OrangeMoney
{

     private $authorization_header = 'Basic emh5U0NxRlVoVVpyWHU0TzV2U0F2QkoxS0FBYmROUkY6ZHBkUU5raG1RUFd6bk1ndA==';
     private $merchant_key = '9729fe79';

     public function __construct()
     {
     }

    public function getAccessToken(){
        $ch = curl_init('https://api.orange.com/oauth/v2/token');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: '.$this->authorization_header
        ));
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        return curl_exec($ch);
     }

}