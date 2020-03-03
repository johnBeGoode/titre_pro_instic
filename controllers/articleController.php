<?php
error_reporting(E_ALL);
use App\EntityManager\MovieManager;

$movieManager = new MovieManager();

$movie = $movieManager->getOne($vars['id']);
$title_page = "Article Chromatic SinémA";
$desc_page = "Fiche détaillé et commentaires utilisateurs";

require_once("../views/" . $vue . ".php");