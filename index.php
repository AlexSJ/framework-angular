<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

// Autoload das classes
include('framework/php/config/Autoload.php');

$controle 	= \framework\php\config\Routers::controle();
$acao		= \framework\php\config\Routers::acao();

$app = '\framework\php\controllers\\' . $controle;
$app = new $app;
($acao ? $app->$acao() : $app->index());

\framework\php\config\Framework::layout();