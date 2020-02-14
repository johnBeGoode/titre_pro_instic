<?php
require("src/Router/Router.php");
$url = trim($_GET['url'],"/");

$router = new Router($url);
$router->getRoute();

