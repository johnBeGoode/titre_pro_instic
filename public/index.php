<?php
session_start(); // lancement global
error_reporting(E_ALL);
require_once("../models/Autoloader.php");
require_once("../controllers/Router/Router.php");
require_once("../functions/function.php");

App\Autoloader::autoload();

$url = trim($_GET['url'],"/");
$router = new Router($url);
$router->getRoute();

