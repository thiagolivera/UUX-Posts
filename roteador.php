<?php
include_once 'app/controller/PagesController.php';

if(isset($_GET['controller']) || isset($_GET['action'])){
	$controllerName = $_GET['controller'] . 'Controller';
	$actionName = $_GET['action'];
	
	$controller = new $controllerName();
	$controller->$actionName();
}else{
	$controllerName = 'pages' . 'Controller';
	$actionName = 'home';
	
	$controller = new $controllerName();
	$controller->$actionName();
}