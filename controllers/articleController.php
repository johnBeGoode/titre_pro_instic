<?php
error_reporting(E_ALL);
use App\EntityManager\MovieManager;
use App\EntityManager\CommentManager;

$title_page = "Article Chromatic SinémA";
$desc_page = "Fiche détaillé et commentaires utilisateurs";

$movieManager = new MovieManager();
$commentManager = new CommentManager();

var_dump($vars);
$movie = $movieManager->getOne($vars['id']);
$comments = $commentManager->getAllComments($vars['id']);

require_once("../views/" . $vue . ".php");