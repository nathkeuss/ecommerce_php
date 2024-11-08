<?php
require_once ('./partials/_header.html');
class VendorMachine
{

    public $snacks;

    public $cashAmount;

    public $isOn;

    public function __construct()
    {
        $this->snacks = [
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

        $this->cashAmount = 0;
        $this->isOn = true;
    }


    public function turnOn()
    {
        if ($this->isOn == false) {
            $this->isOn = true;
        }
    }

    function turnOff()
    {
        $now = new DateTime();
        $limitTime = new DateTime('18:00');

        if ($now >= $limitTime) {
            $this->isOn = false;
        } else {
            throw new Exception("Vous ne pouvez pas éteindre la machine car il n'est pas encore dix-huit heures.");
        }
    }

    public function buySnack($snackName)
    {
        if ($this->isOn) {
            foreach ($this->snacks as $index => $snack) {
                if ($snack["name"] === $snackName && $snack["quantity"] >= 1) {
                    $this->snacks[$index]["quantity"] = $this->snacks[$index]["quantity"] - 1;
                    $this->cashAmount = $this->cashAmount += $snack["price"];
                }
            }
        } else {
            throw new Exception("La machine n'est pas allumée.");
        }
    }

    public function shootWithFoot()
    {
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
$order2->turnOn();
$order2->buySnack("Twix");
echo '<pre style="font-size: 18px; color:white;">';
var_dump($order2);
echo '</pre>';

//$order3 = new VendorMachine();
//$order3->turnOn();
//var_dump($order3);