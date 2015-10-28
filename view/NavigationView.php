<?php

class NavigationView {

    private static $currencyLink = "currencyconverter";
    private static $backLink = '';
    
    public function LinkPressed() { 
      
        return isset($_GET[self::$currencyLink]);
    }
    
    public function DrawLink() {
    
      	if (!$this->LinkPressed()) {
      	    
      		return $this->DrawCurrencyLink();
        }
        else
        {
      		return $this->DrawBackLink();
      	}
      	
    }

    public function DrawCurrencyLink() {
        
        return "<div><a href='?". self::$currencyLink ."'>Start Currency Converter</a><br /><br /></div>";
 	 }

 	 public function DrawBackLink() {
 	     
        return "<a href='?". self::$backLink ."'>Back</a><br />";
 	 }



}
