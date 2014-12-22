<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

// Autoload das classes
include('framework/config/Autoload.php');

$controle 	= \framework\config\Routers::controle();
$acao		= \framework\config\Routers::acao();

$app = '\framework\controller\\' . $controle;
$app = new $app;
($acao ? $app->$acao() : $app->index());