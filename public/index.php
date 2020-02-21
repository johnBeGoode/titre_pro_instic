<?php
require_once("../models/Autoloader.php");
require("../controllers/Router/Router.php");

App\Autoloader::autoload();

$url = trim($_GET['url'],"/");
$router = new Router($url);
$router->getRoute();

