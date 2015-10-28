<?php 

require_once('model/ConvertModel.php');
require_once('model/CurrencyModel.php');

require_once('view/HomeView.php');
require_once('view/LayoutView.php');
require_once('view/DateTimeView.php');
require_once('view/CurrencyView.php');
require_once('view/NavigationView.php');

require_once('controller/Controller.php');

//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$layoutView = new LayoutView();
$dateTimeView = new DateTimeView();
$navigationView = new NavigationView();
$controller = new Controller();
$view = $controller->StartApp();

$layoutView->DrawLayout($dateTimeView, $navigationView, $view);
