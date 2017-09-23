<?php
class Exchange {

     var $currencyFrom;
     var $currencyTo;
     var $quantity;
     
     function setCurrencyFrom($currencyFrom){
         $this->currencyFrom = $currencyFrom;
     }
     
     function setCurrencyTo($currencyTo){
         $this->currencyTo = $currencyTo;
     }
     
     function setQuantity($quantity){
         $this->quantity = $quantity;
     }
    
     function getResult() { 
        
         $errorResut="";
        
        if($this->currencyFrom == ""){
            $errorResut = array("status"=>"401","message"=>"Missing currency from");
        }
        
        if($this->currencyTo == ""){
            $errorResut = array("status"=>"401","message"=>"Missing currency to");
        }
        
        if($this->quantity == ""){
            $errorResut = array("status"=>"401","message"=>"Missing quantity");
        }
        
        if ($this->currencyFrom == $this->currencyTo) {
            $errorResut = array("status"=>"401","message"=>"The currency cannot be same");
        }
        
        if($errorResut!=""){
           return json_encode($errorResut);
        }
          
        $ch = curl_init('http://api.fixer.io/latest?base='. $this->currencyFrom);   

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // get the (still encoded) JSON data:
        $json = curl_exec($ch);
        curl_close($ch);

        // Decode JSON response:
        //$json = '{"base":"HKD","date":"2017-09-22","rates":{"AUD":0.16069,"BGN":0.20937,"BRL":0.401,"CAD":0.1571,"CHF":0.12405,"CNY":0.84361,"CZK":2.7882,"DKK":0.79653,"GBP":0.09437,"HRK":0.8012,"HUF":33.157,"IDR":1703.0,"ILS":0.44699,"INR":8.2965,"JPY":14.346,"KRW":144.82,"MXN":2.2791,"MYR":0.5365,"NOK":0.99763,"NZD":0.17488,"PHP":6.48,"PLN":0.45681,"RON":0.49208,"RUB":7.3745,"SEK":1.0208,"SGD":0.17228,"THB":4.2369,"TRY":0.44751,"USD":0.12804,"ZAR":1.6952,"EUR":0.10705}}';

        $conversionResult = json_decode($json, true);
        $exchangeRate = $conversionResult['rates'][$this->currencyTo];
        $amount = $this->quantity * $exchangeRate;
        $result = array("status"=>"400","rates"=>$exchangeRate, 'amount'=>$amount);
        return json_encode($result);
        
        }
}
?>