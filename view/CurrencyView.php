<?php

class CurrencyView {
	
	private static $convertButton = 'CurrencyView::Convert';
	private static $value = 'CurrencyView::Value';
	private static $messageId = 'CurrencyView::Message';

	private static $message = '';
	private static $currencyResult = '';
	private $selectedFrom = '';
	private $selectedTo = '';
	private $currencyModel;
	
	public function __construct() {

		$this->currencyModel = new CurrencyModel();
	}

	public function header() {

		return 'Currency Converter';
	}

	public function GetInput() {
		
		try {
			
			self::$currencyResult = $this->currencyModel->GetCurrencyResult($this->SetCurrencyValue(),
			$this->GetFromConvertInput(), $this->GetTooConvertInput());
			
			return self::$currencyResult;
		} 
		catch (InvalidArgumentException $e) 
		{
			self::$message = "Only numeric values";
		}
		
	}
	
	public function GetCurrencies($selected) {
		
		$options='';
		
		foreach ($this->currencyModel->GetCurrencies() as $index => $value) {

			if ($selected == $value) {
				$options .= '<option value="'.$value.'" selected>'.$value.'</option>';
			}
			else
			{
				$options .= '<option value="'.$value.'" >'.$value.'</option>';
			}
			
		}
		return $options;
	}
	
	public function GetFromConvertInput() {
		
		if (isset($_POST['ConvertFrom'])) {
			
			return $_POST['ConvertFrom'];
		}
		
	}

	public function SetFromConvertInput() {

		if (isset($_POST['ConvertFrom'])) {
			
			$this->selectedFrom = $_POST['ConvertFrom'];
		}
		
	}
	
	public function GetTooConvertInput() {
		
		if (isset($_POST['ConvertToo'])) {
			
			return $_POST['ConvertToo'];
		}
		
	}

	public function SetTooConvertInput() {
		
		if (isset($_POST['ConvertToo'])) {
			
			$this->selectedTo = $_POST['ConvertToo'];
		}
		
	}
	

	public function SetCurrencyValue() {
		
		 if (isset($_POST[self::$value])) {
		 	
      		return ($_POST[self::$value]);
   		 }
   		 
	}

	public function GetCurrencyValue() {
		
		return self::$value;
	}

	public function GetFromInput() {
		
		return $this->selectedFrom;
	}

	public function GetTooInput() {
		
		return $this->selectedTo;
	}

	public function GetResultOfConvertedCurrency() {
		
		return self::$convertedCurrencyResult;
	}

	public function GetConvertButton() {
		
		return self::$convertButton;
	}

	public function GetMessageId() {
		
		return self::$messageId;
	}

	public function GetMessage() {
		
		return self::$message;
	}

}