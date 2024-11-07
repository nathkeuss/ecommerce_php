<?php
require_once "./partials/_header.html";

class VendorMachine
{

    public $snacks = [
        [
            "name" => "Snickers",
            "price" => 1,
            "quantity" => 5
        ],
        [
            "name" => "Mars",
            "price" => 1.5,
            "quantity" => 5
        ],
        [
            "name" => "Twix",
            "price" => 2,
            "quantity" => 5
        ],
        [
            "name" => "Bounty",
            "price" => 2.5,
            "quantity" => 5
        ]
    ];

    public $cashAmount = 0;

    public $isOn = true;

    public function turnOn()
    {
        if ($this->isOn == false) {
            $this->isOn = true;
        }
    }

    public function buySnack($snackName) {
        if ($this->isOn == true && $this->snacks[$snackName]["name"] > 1) {
            $this->snacks[$snackName]["quantity"] -= 1;
            $this->cashAmount += $this->snacks[$snackName]["price"];
        }
    }

    public function shootWithFoot() {
        if ($this->isOn === true) {
            array_rand($this->snacks["name"]);
            rand(1, $this->cashAmount);
            $this->cashAmount -= rand(1, $this->cashAmount);
        }
    }


}

//$order1 = new VendorMachine();
//$order1->shootWithFoot();
//var_dump($order1);

$order2 = new VendorMachine();
$order2-> turnOn();
$order2->buySnack("Twix");
var_dump($order2);




