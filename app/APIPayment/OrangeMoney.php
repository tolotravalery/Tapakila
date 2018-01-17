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

    private $authorization_header = 'Basic bEt6dk5teGt2WUpHZ1UxR3ZsUlpBUzJhd2JCTFFHRWs6NVFxUERmSVdWQTFwMU5uVg==';
    private $merchant_key = '28ee3a89';
    private $amount;
    private $order_id;

    public function __construct($amount,$order_id)
    {
        $this->amount = $amount;
        $this->order_id = $order_id;
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
//        dd(curl_exec($ch));
        return json_decode(curl_exec($ch))->access_token;
    }

    public function getPaymentUrl($returnUrl)
    {
        $data = array("merchant_key" => $this->merchant_key,
            "currency" => "MGA",
            "order_id" => $this->order_id,
            "amount" => $this->amount,
            "return_url" => $returnUrl,
            "cancel_url" => url('/home'),
            "notif_url" => url('payments/notify/orange'),
            "lang" => "fr"
        );
        $ch = curl_init('https://api.orange.com/orange-money-webpay/mg/v1/webpayment');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer ' . $this->getAccessToken(),
            'Accept: application/json',
            'Content-Type: application/json'
        ));
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        dd(curl_exec($ch));
        return json_decode(curl_exec($ch));

    }

}