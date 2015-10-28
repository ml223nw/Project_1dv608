<?php

class CurrencyModel extends ConvertModel {
	
	private $currencyArray = array("SEK", "EUR", "USD", "GBP", "CZK", "DZD", "EGP", "BGN", "BYR", "HRK", "KPW", "LBP", "MKD", "MXN", "NOK", "BAM", "CAD");
	
	
	public function __construct() {

		parent::SetCurrencies($this->currencyArray);
	}

}