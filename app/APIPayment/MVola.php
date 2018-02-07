<?php

/**
 * Created by PhpStorm.
 * User: KOERA
 * Date: 06/02/2018
 * Time: 09:15
 */

namespace App\APIPayment;

class MVola
{
    private $MPGW_WS_URL = "https://www.telma.net/mpgw/v2/ws/MPGwApi";
    private $MPGW_TRANSACTION_URL = "https://www.telma.net/mpgw/v2/transaction/";
    private $APIVersion = "2.0.0";
    private $loginws = "leguichet";
    private $pwdws = "Gu1ch18";
    private $hash = "5a258245fe3c666e0d083e3f5b48e3ca21b91de09e199a75f5ea42faef9733b3";

    private $amount;
    private $order_id;
    private $user;

    public function __construct($amount = null, $order_id = null, $user = null)
    {
        $this->amount = $amount;
        $this->order_id = $order_id;
        $this->user = $user;
    }

    public function getPaymentUrl($userField)
    {
        $parameters = new \stdClass();
        $parameters->Login_WS = $this->loginws;
        $parameters->Password_WS = $this->pwdws;
        $parameters->HashCode_WS = $this->hash;
        $parameters->ShopTransactionAmount = $this->amount;
        $parameters->ShopTransactionID = $this->order_id;
        $parameters->ShopTransactionLabel = "Ticket de Le Guichet";
        $parameters->ShopShippingName = $this->user->name;
//        $parameters->ShopShippingAddress = $this->user->email;
        $parameters->UserField1 = $userField;
        $parameters->UserField2 = "";
        $parameters->UserField3 = "";
        $ws = new \SoapClient($this->MPGW_WS_URL);

        $retour = $ws->WS_MPGw_PaymentRequest($this->APIVersion, $parameters);

        if ($retour->APIVersion != $this->APIVersion) {
            $data = array('status' => false, 'message' => "incorrect API Version");
            return $data;
        } elseif ($retour->ResponseCode != 0) {
            $data = array('status' => false, 'message' => "ERROR : " . $retour->ResponseCodeDescription);
            return $data;
        } else {
            $MPGw_Token = $retour->MPGw_TokenID;
            $data = array('status' => true, 'message' => $this->MPGW_TRANSACTION_URL . $MPGw_Token, 'token' => $MPGw_Token);
            return $data;
        }

    }

    public function getNotification($tokenId)
    {

        $ws = new \SoapClient($this->MPGW_WS_URL);
        $parameters = new \stdClass();
        $parameters->Login_WS = $this->loginws;
        $parameters->Password_WS = $this->pwdws;
        $parameters->HashCode_WS = $this->hash;
        $parameters->MPGw_TokenID = $tokenId;

        $retour = $ws->WS_MPGw_CheckTransactionStatus($this->APIVersion, $parameters);

        if ($retour->APIVersion != $this->APIVersion) {
            echo "incorrect API Version";
            die();
        } elseif ($retour->ResponseCode != 0) {
            echo "ERROR : " . $retour->ResponseCodeDescription;
            die();
        } else {
            return array('status'=>$retour->TransactionStatusCode,'user_field'=>$retour->UserField1);
        }

    }

}