<?php

require_once "./partials/_header.html";

class order
{

    public $id;
    public $customerName;
    public $deliveryAdress;
    public $status = "cart"; //je dis que status = cart de base
    public $totalPrice = 0; //que le prix total de base est 0
    public $products = []; //et que les produits seront dans un tableau


//le construteur est une méthode "magique" car elle est appelée automatiquement
//le constructeur est appelée quand un objet est crée pour cette classe
//un objet crée pour une classe appelée "instance de class"
    public function __construct($customerName, $deliveryAdress)
    {
        $this->customerName = $customerName;
        $this->deliveryAdress = $deliveryAdress;
        $this->id = uniqid();
    }


    public function addProduct()//fonction qui ajoute un produit et un prix si le status est cart.
    {   //le $this fait référence à l'object actuel
        //c'est à dire à $order1, ou $order2 etc
        //donc à l'objet actuel issu de la classe
        if ($this->status === "cart") {
            $this->products[] = "babybel";//j'ajoute un produit au tableau
            $this->totalPrice += 2;//j'ajoute 2 au totalPrice de base (donc 0)
        }
    }


    public function removeProduct()
    { //function qui retire le dernier produit ajouter
        if ($this->status === "cart" && !empty($this->products)) {
            array_pop($this->products);//je retire le dernier produit ajouter au tableau
            $this->totalPrice -= 2;//je retire 2 au prix total
        }
    }

    public function pay()//fonction qui passe le status cart à paid pour dire qu'il peut payer
    {
        if ($this->status === "cart") {
            $this->status = "paid";
        }
    }

    public function sendOrder()
    {
        if ($this->status === "paid") {
            $this->status = "sent";
            echo "Votre commande a bien été envoyée";
        }
    }

}



//je créé une instance de la classe order
//c'est à dire un objet issu du plan de construction de la classe order
$order1 = new order("Nathan", "bordeaux rue 15"); //nouvelle commande
$order1->addProduct(); //j'ajoute un produit en plusieurs fois
$order1->addProduct();
$order1->removeProduct();//je retire le dernier produit ajouter
$order1->addProduct();
$order1->addProduct();
$order1->pay();//et je paie
$order1->sendOrder();
var_dump($order1);
