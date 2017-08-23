<?php
/**
 * Created by PhpStorm.
 * User: KOERA
 * Date: 23/08/2017
 * Time: 09:48
 */

namespace App\Models;


class Checkout
{
    private $adresseFacturation = array();
    private $adresseLivraison = array();
    private $cart = array();
    private $methodePayement;


    public function __construct($adresseFacturation, $adresseLivraison, $methodePayement, $cart)
    {
        $this->adresseFacturation = $adresseFacturation;
        $this->adresseLivraison = $adresseLivraison;
        $this->methodePayement = $methodePayement;
        $this->cart = $cart;
    }

    /**
     * @return array
     */
    public function getAdresseFacturation()
    {
        return $this->adresseFacturation;
    }

    /**
     * @param array $adresseFacturation
     */
    public function setAdresseFacturation($adresseFacturation)
    {
        $this->adresseFacturation = $adresseFacturation;
    }

    /**
     * @return array
     */
    public function getAdresseLivraison()
    {
        return $this->adresseLivraison;
    }

    /**
     * @param array $adresseLivraison
     */
    public function setAdresseLivraison($adresseLivraison)
    {
        $this->adresseLivraison = $adresseLivraison;
    }

    /**
     * @return mixed
     */
    public function getMethodePayement()
    {
        return $this->methodePayement;
    }

    /**
     * @param mixed $methodePayement
     */
    public function setMethodePayement($methodePayement)
    {
        $this->methodePayement = $methodePayement;
    }

    /**
     * @return array
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * @param array $cart
     */
    public function setCart($cart)
    {
        $this->cart = $cart;
    }


}