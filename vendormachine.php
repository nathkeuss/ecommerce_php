<?php

require_once('./config/config.php');
require_once('./partials/_header.html');

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


    public function turnOn() //si turnOn est false il passe à true
    {
        if ($this->isOn == false) {
            $this->isOn = true;
        }
    }

    function turnOff()//après 18h la machine s'éteint
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
        if ($this->isOn) { //la machine doit être allumé
            foreach ($this->snacks as $index => $snack) { //boucle sur la liste des snacks
                if ($snack["name"] === $snackName && $snack["quantity"] >= 1) { // vérifie si le nom du snack correspond et si la quantité est supérieur à 0
                    $this->snacks[$index]["quantity"] = $this->snacks[$index]["quantity"] - 1; // décrément la quantité du snack
                    $this->cashAmount = $this->cashAmount += $snack["price"]; //ajoute le prix du snack au montant de cashAmount
                }
            }
        }
    }


    public function shootWithFoot()
    {
        if ($this->isOn === true) { //si la machine est allumée
            $randomCash = rand(1, $this->cashAmount); // prend un nombre aléatoire du total de cashAmount
            $this->cashAmount -= $randomCash; // le décrément du total cashAmount
            echo '<pre style="font-size: 18px; color:green;">';
            echo "{$randomCash}€ sont tombés";
            echo '</pre>';

            $snackIndex = array_rand($this->snacks);//sélectionne un index aléatoire dans le tableau snacks
            $snack = $this->snacks[$snackIndex];//récupère le snack aléatoire

            if ($snack['quantity'] >= 1) { // si la quantité est supérieur ou égal à 1
                $this->snacks[$snackIndex]["quantity"] - 1; //ça retire une quantité du snack en question

                echo '<pre style="font-size: 18px; color:yellow;">';
                echo "{$snack['name']} est tombé";
                echo '</pre>';
            }
        }
    }


}

$order1 = new VendorMachine();
$order1->buySnack("Twix");
$order1->buySnack("Twix");
$order1->buySnack("Twix");
$order1->buySnack("Twix");
$order1->buySnack("Bounty");
$order1->buySnack("Snickers");
$order1->shootWithFoot();
echo '<pre style="font-size: 18px; color:white;">';
var_dump($order1);
echo '</pre>';