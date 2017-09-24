        Support Currency:
        "AUD","BGN","BRL","CAD","CHF","CNY","CZK","DKK","EUR","GBP","HKD", 
        "HRK","HUF","IDR","ILS","INR","JPY","KRW","MXN","MYR","NOK","NZD", 
        "PHP","PLN","RON","RUB","SEK","SGD","THB","TRY","USD","ZAR"

        Example code of get the exchange rate
        step 1: include the Exchange.php in your php file
        include "Exchange.php"; 

        step 2:  Creating an instance
        $exchange = new Exchange;

        step 3: set the variable
        $exchange->setCurrencyTo('currencyTo'); 
        $exchange->setCurrencyFrom('currencyFrom'); 
        $exchange->setQuantity('quantity');
            
        step 4: get the reslut with json format
        $result = $exchange->getResult();

