<?php 
use App\EntityManager\MovieManager;
use App\EntityManager\CommentManager;
use App\EntityManager\UserManager;
use App\EntityManager\CategoryManager;


$title_page = "Administration Chromatic SinémA";
$desc_page = "Accès à tous les articles, films, commentaires et utilisateurs du site";


$movieManager = new MovieManager();
$commentManager = new CommentManager();
$userManager = new UserManager();
$categoryManager = new CategoryManager();

$nbMovies = $movieManager->count();
$movies = $movieManager->getAllMovies();
$comments = $commentManager->getAllComments();
$users = $userManager->getAllUsers();
$categories = $categoryManager->getAllCategories();

require_once '../views/' . $vue . '.php'; 
