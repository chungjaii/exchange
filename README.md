
        #Documentation
        ##Support Currency
        "AUD","BGN","BRL","CAD","CHF","CNY","CZK","DKK","EUR","GBP","HKD", <br>
            "HRK","HUF","IDR","ILS","INR","JPY","KRW","MXN","MYR","NOK","NZD", <br>
            "PHP","PLN","RON","RUB","SEK","SGD","THB","TRY","USD","ZAR"
        ##Example code of get the exchange rate<
        ###step 1: include the Exchange.php in your php file
        <p>include "Exchange.php"; </p>
        ###step 2:  Creating an instance</h3>
        <p>$exchange = new Exchange;</p>
        ###step 3: set the variable</h3>
        
            $exchange->setCurrencyTo('currencyTo'); <br>
            $exchange->setCurrencyFrom('currencyFrom'); <br>
            $exchange->setQuantity('quantity');
            
        
        ###step 4: get the reslut with json format
        $result = $exchange->getResult();

