  <?php

include "Exchange.php";

$exchange = new Exchange;


$currencyFrom = $_REQUEST['currencyFrom'];
$currencyTo = $_REQUEST['currencyTo'];
$quantity = $_REQUEST['quantity'];
$support = ["AUD","BGN","BRL","CAD","CHF","CZK","DKK","GBP","HKD","HRK","HUF",
            "IDR","ILS","INR","JPY","KRW","MXN","MYR","NOK","NZD","PHP","PLN",
            "RON","RUB","SEK","SGD","THB","TRY","USD","ZAR","EUR","CNY"];


if (!in_array($currencyFrom, $support)) {
    echo "from not support";
    return false;
}

if (!in_array($currencyTo, $support)) {
    echo "to not support";
    return false;
}

if($quantity < 0){
  echo  'quantity less than 0';
  return false;
}
$exchange->setCurrencyTo($currencyTo);
$exchange->setCurrencyFrom($currencyFrom);
$exchange->setQuantity($quantity);
$result = $exchange->getResult();
$conversionResult = json_decode($result, true);

if($conversionResult['status'] == "401"){
    echo $conversionResult['message'];
}else{

    $exchangeRate = $conversionResult['rates'];
    $result = $quantity * $exchangeRate;
    echo "The exchange rate of ". $currencyFrom . ":" . $currencyTo ." is 1:" . $exchangeRate . "<br>";
    echo "You can exchange " . $currencyTo . $result. " with " . $currencyFrom . $quantity;
}
?>