<?php
// inclure la classe User avant le session_start pour stocker la class dans la globale SESSION
require_once '../models/Entity/User.php';

session_start(); // lancement global
error_reporting(E_ALL);

require_once '../models/Autoloader.php';
require_once '../controllers/Router/Router.php';
require_once '../functions/functions.php';

App\Autoloader::autoload();

$url = trim($_GET['url'],"/");
$router = new Router($url);
$router->getRoute();