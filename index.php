<?php
session_start();

require('config.php');

//Classes
require('classes/messages.php');
require('classes/abstractController.php');
require('classes/controller.php');
require('classes/model.php');

//Controllers
require('controllers/home.php');
require('controllers/clientes.php');
require('controllers/produtos.php');
require('controllers/ordem.php');

//Models
require('models/home.php');
require('models/clientes.php');
require('models/produtos.php');
require('models/ordem.php');

$abstractController = new abstractController($_GET); //Pega os Parâmetros da URL
$controller = $abstractController->createController();

if($controller){
	$controller->executeAction();
}

?>