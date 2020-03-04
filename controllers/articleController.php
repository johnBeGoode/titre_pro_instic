<?php
error_reporting(E_ALL);
use App\EntityManager\MovieManager;
use App\EntityManager\CommentManager;
use App\Entity\Comment;

$title_page = "Article Chromatic SinémA";
$desc_page = "Fiche détaillé et commentaires utilisateurs";

$movieManager = new MovieManager();
$commentManager = new CommentManager();
$comment = new Comment();

$movie = $movieManager->getOne($vars['id']);
$comments = $commentManager->getAllComments($vars['id']);
$userName = $commentManager->getUserName(2); // si valeur en dure ça marche

require_once("../views/" . $vue . ".php");