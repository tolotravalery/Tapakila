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
    private $amount;

    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    public function getAccessToken()
    {
        $ch = curl_init('https://api.orange.com/oauth/v2/token');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: ' . $this->authorization_header
        ));
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        return json_decode(curl_exec($ch))->access_token;
    }

    public function getPaymentUrl($returnUrl)
    {
        $data = array("merchant_key" => $this->merchant_key,
            "currency" => "OUV",
            "order_id" => rand(1000,10000),
            "amount" => intval($this->amount),
            "return_url" => $returnUrl,
            "cancel_url" => url('/home'),
            "notif_url" => url('payments/notify/orange'),
            "lang" => "fr"
        );
        $ch = curl_init('https://api.orange.com/orange-money-webpay/dev/v1/webpayment');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer ' . $this->getAccessToken(),
            'Accept: application/json',
            'Content-Type: application/json'
        ));
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        dd(json_decode(curl_exec($ch)));
        return json_decode(curl_exec($ch));

    }

}