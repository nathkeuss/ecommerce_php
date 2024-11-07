<?php

class order
{

    public $id;
    public $customerName;
    public $status = "cart"; //je dis que status = cart de base
    public $totalPrice = 0; //que le prix total de base est 0
    public $products = []; //et que les produits seront dans un tableau


    public function addProduct()//fonction qui ajoute un produit et un prix si le status est cart.
    {
        if ($this->status === "cart") {
            $this->products[] = "babybel";
            $this->totalPrice += 2;
        }
    }

    public function pay()//fonction qui passe le status cart à paid pour dire qu'il peut payer
    {
        if ($this->status === "cart") {
            $this->status = "paid";
        }
    }
}


$order1 = new order(); //nouvelle commande
$order1->addProduct(); //j'ajoute un produit en plusieurs fois
$order1->addProduct();
$order1->pay();//et je paie
var_dump($order1);

$order2 = new order();
$order2->addProduct();
$order2->addProduct();
$order2->addProduct();
$order2->addProduct();
$order2->addProduct();
$order2->pay();
var_dump($order2);