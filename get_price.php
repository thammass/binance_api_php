<?php

require 'vendor/autoload.php';
// 1. config in home directory
//$api = new Binance\API();
$api = new Binance\API( "api02_php.json" );

/*
$ticker = $api->prices();
print_r($ticker);
*/
echo "<br>===== markey price ======<br>";
get_price_coin("BTC");
get_price_coin("ETH");
get_price_coin("ICP");
get_price_coin("ADA");
get_price_coin("BNB");
echo "========================<br>";


// Get all of your positions, including estimated BTC value
$balances = $api->balances($tickers);
print_r($balances);

// Get all bid/ask prices
$bookPrices = $api->bookPrices();
print_r($bookPrices);
echo "BTC owned: ".$balances['BTC']['available']."\n";
echo "ETH owned: ".$balances['ETH']['available']."\n";
echo "Estimated Value: ".$api->btc_value." BTC\n";
echo "<br>========================<br>";
echo "BTC owned: ".$balances['BTC']['available'].PHP_EOL."<br>";
echo "ETH owned: ".$balances['ETH']['available'].PHP_EOL."<br>";
echo "ETH owned: ".$balances['ICP']['available'].PHP_EOL."<br>";
echo "ETH owned: ".$balances['ADA']['available'].PHP_EOL."<br>";
echo "ETH owned: ".$balances['BNB']['available'].PHP_EOL."<br>";
echo "<br>========================<br>";
echo "Estimated Value: ".$api->btc_value." BTC".PHP_EOL."<br>";
echo "<br>========================<br>";
echo "<br><br>";


function get_price_coin($COIN){
    global $api;
    $price = $api->price($COIN."USDT");
    echo "Price of $COIN: {$price} USDT.".PHP_EOL."<br>";
}

?>