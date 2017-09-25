<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <title>Exchange Rate Test Form</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form action="test-cache-result.php" method="post">
            quantity:
            <input type="text" name="quantity"/>
            <br>
            currency from:
            <select  name="currencyFrom">
                <?php foreach (supportCurrency() as $currency): ?>
                <option value="<?php echo $currency ?>"><?php echo $currency ?></option>
                <?php endforeach;?>
            </select>
            <br>
             currency to:
            <select  name="currencyTo">
                <?php foreach (supportCurrency() as $currency): ?>
                <option value="<?php echo $currency ?>"><?php echo $currency ?></option>
                <?php endforeach;?>
            </select>
            <br><br>
            <input type="submit" value="Submit">
      </form> 
   
        
    </body>
</html>
<?php 
function supportCurrency(){
    $support = ["AUD","BGN","BRL","CAD","CHF","CNY","CZK","DKK","EUR","GBP","HKD",
                "HRK","HUF","IDR","ILS","INR","JPY","KRW","MXN","MYR","NOK","NZD",
                "PHP","PLN","RON","RUB","SEK","SGD","THB","TRY","USD","ZAR"];
    return $support;
}
?>