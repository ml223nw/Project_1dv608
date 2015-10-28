<?php

class ConvertModel {

	private $currencyResult;
	private $convertArray = array();

	public function SetCurrencies($convertArray) {

		$this->convertArray = $convertArray;
	}
	
	public function CalculateCurrency($input, $convertFromCurrency, $convertTooCurrency, $convertArray) {
		
		if (!is_numeric($input)) {
			
			throw new InvalidArgumentException("Invalid input");
		}
		
		$convertFromCurrencyValue;
		
		foreach($convertArray as $index => $value) {
			
			if ($index == $convertFromCurrency) {
				
				$convertFromCurrencyValue = $value;	
			}
			
		}
			
		$convertTooCurrencyValue;
		
		foreach($convertArray as $index => $value) {
			
			if ($index == $convertTooCurrency) {
				
				$convertTooCurrencyValue = $value;	
			}
			
		}
	
	}

	public function GetCurrencyResult($input, $convertFromCurrency, $convertTooCurrency) {
		
		if (!is_numeric($input) && $input != "") {
			
			throw new InvalidArgumentException("Invalid input");
		}
		
		$csvFilePath = 'http://finance.yahoo.com/d/quotes.csv?f=l1d1t1&s='.$convertFromCurrency.$convertTooCurrency.'=X';
		$handleFile = fopen($csvFilePath, 'r');

		if ($handleFile) {
			
			$getValuesFromFile = fgetcsv($handleFile);
			fclose($handleFile);
		}
	
		if ($input != 0) {
			
			$this->currencyResult = number_format(($input * $getValuesFromFile[0]), 3, '.', '');
			return (float)$this->currencyResult;
		}
		else
		{
			return $this->currencyResult;
		}
				
	}

	public function GetCurrencies() {
		
		return $this->convertArray;
	}

}