<?php

class Controller {

	private $navigationView;
 
	public function __construct() {
			
		$this->navigationView = new NavigationView();
	}

	public function StartApp() {

        if ($this->navigationView->LinkPressed()) {
            
     		return new CurrencyView();
        } 
        else 
        {
        	return new HomeView();
	    }
	
    }
    
}