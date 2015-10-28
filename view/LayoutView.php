<?php

class LayoutView {

  public function DrawLayout(DateTimeView $dateTimeView, NavigationView $navigationView, $getThis) {

       echo '<!DOCTYPE html>
        <html>
          <head>
            <meta charset="utf-8">
            <title>Converter</title>
          </head>
          <body>
            <h1>'.$getThis->Header().'</h1>
            ' . $navigationView->DrawLink() . '
            <div class="container">
                ' . $this->DrawResponse($getThis) . '
                
            </div>
            ' . $dateTimeView->DrawDateTimeView() . '
           </body>
        </html>
      ';

  }

  public function DrawResponse($getThis) {

      if ($getThis == new HomeView()) {
      
          return '';
      }
      
      if (!$getThis == new HomeView()) {
        
          return $getThis->DrawResponse();
      }
      
      return "<div'>" . '
          <form method="post" > 
            <br/>
            <label for="'. $getThis->GetCurrencyValue() .'"></label>
            <input type="text" id="' . $getThis->GetCurrencyValue() . '" name="' . $getThis->GetCurrencyValue() . '" value="' . $getThis->SetCurrencyValue() . '""/>
                '.$getThis->SetFromConvertInput().'
            <select name = "ConvertFrom">
                '.$getThis->GetCurrencies($getThis->GetFromInput()).'
            </select>
                '.$getThis->SetFromConvertInput().'
            <label for="' . $getThis->GetInput() . '"> = </label>
            <input type="text" id=" ' . $getThis->GetInput() . '" name="' . $getThis->GetInput() . '" value="' . $getThis->GetInput() . '"" disabled="true"/> 
            <select name = "ConvertToo">
                '.$getThis->GetCurrencies($getThis->GetTooInput()).'
            </select>
            <input type="submit" name="' . $getThis->GetConvertButton() . '" value="Convert" />
            <p id="' . $getThis->GetMessageId() . '">' . $getThis->GetMessage() . '</p>
        </form></div>
        
      ';
    }

}

 
