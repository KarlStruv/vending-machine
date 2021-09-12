<?php
$customer = new stdClass();
$customer->wallet = [
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

foreach ($customer->wallet as $key => $coin){
    echo "Coin(cents): $key  Amount: $coin" . PHP_EOL;
}

function createCoffee(int $ID, string $name, int $price) : stdClass{
    $coffee = new stdClass();
    $coffee->ID = $ID;
    $coffee->name = $name;
    $coffee->price = $price;

    return $coffee;
}
$products= [
    createCoffee(1, "Black Coffee", 110),
    createCoffee(2, "White Coffee", 130),
    createCoffee(3, "Latte", 145),
    createCoffee(4, "Macchiato", 165),
];

echo "----COFFEE SHOP-------" . PHP_EOL;
foreach ($products as $key => $product){
    $price = $product->price / 100;
    echo "$key. {$product->name} | {$price}$" . PHP_EOL;
}

$selection = (int)readline("Select your drink: ");

if (!isset($products[$selection])){
    echo "Invalid product." . PHP_EOL;
    exit;
}

$selectedProduct = $products[$selection];

$insertedCoins = 0;

while ($insertedCoins < $selectedProduct->price){
    echo "Left to pay: " . ($selectedProduct->price - $insertedCoins) / 100 . "$" . PHP_EOL;
    $coin = (int)readline("Insert a coin: ");

    if(!in_array($coin, array_keys($customer->wallet))){
        echo "Invalid coin!" . PHP_EOL;
        continue;
    }

    if (isset($customer->wallet[$coin]) && $customer->wallet[$coin] <= 0){
        echo "Coin not found." . PHP_EOL;
        continue;
    }

    $customer->wallet[$coin] -= 1;

    $insertedCoins += $coin;
}

$return = $insertedCoins - $selectedProduct->price;

foreach (array_reverse(array_keys($customer->wallet)) as $coin){
    $quantity = intdiv($return, $coin);
    if($quantity > 0){
        $customer->wallet[$coin] += $quantity;
        $return -= $coin * $quantity;
    }
}

foreach ($customer->wallet as $key => $coin){
    echo "Coin(cents): $key  Amount: $coin" . PHP_EOL;
}




















