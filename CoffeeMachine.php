<?php
$wallet = [
    1 => 10,
    2 => 10,
    5 => 10,
    10 => 10,
    20 => 10,
    50 => 10,
    100 => 10,
    200 => 10

];

$vendingMachine = [
    1 => 10,
    2 => 10,
    5 => 10,
    10 => 10,
    20 => 10,
    50 => 10,
    100 => 10,
    200 => 10

];

function createCoffee(int $ID, string $name, int $price) : stdClass{
    $coffee = new stdClass();
    $coffee->ID = $ID;
    $coffee->name = $name;
    $coffee->price = $price;

    return $coffee;
}
$coffeeChoices= [
    createCoffee(1, "Black Coffee", 110),
    createCoffee(2, "White Coffee", 130),
    createCoffee(3, "Latte", 145),
    createCoffee(4, "Macchiato", 155),
];




foreach ($coffeeChoices as $item){
    $price = $item->price/100 ;

    echo "$item->ID. $item->name, $price" . PHP_EOL;

}
$choice = (int)readline("Which coffee would you like? ");
echo PHP_EOL;


foreach ($coffeeChoices as $item){
    if ($item->ID === $choice){
        $price = $item->price/100 ;
        echo "You chose: $item->name. That will be: $price" . PHP_EOL;
    }
}

$transactionInProgress = true;
$leftToPay = $price;

while($transactionInProgress){
    $insertedCoin = 0;
    echo "Left to pay: $leftToPay" . PHP_EOL;

    $insert = (int)readline("Insert coin: ");
    $insertedCoin = $insert / 100;

    if(!array_key_exists($insert, $wallet)){

        var_dump(array_keys($wallet, $insert));
        echo "Please enter a valid coin value!" . PHP_EOL;
        echo " " . PHP_EOL;
    }

    else if ($leftToPay - $insertedCoin > 0){
        $leftToPay -=$insertedCoin;


    }

    else if ($leftToPay - $insertedCoin < 0){
        $leftToPay -=$insertedCoin;
        echo "Dispenser is giving you change: " . PHP_EOL;
        while ($leftToPay !== 0){
            ///Please don't lynch me. I will solve this part very soon. Recording from the zoom would be very useful :D
        }

    }

    else{
        echo "Thank you for the transaction!" . PHP_EOL;
        $transactionInProgress = false;
    }
}


