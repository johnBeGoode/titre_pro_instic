<?php

use App\EntityManager\MovieManager;
use App\EntityManager\CategoryManager;

$categoryManager = new CategoryManager();
$movieManager = new MovieManager();

$title_page = 'Erreur 404';
$desc_page = 'Erreur 404 -- page non trouvée';
$baliseMetaRobots = '<meta name="robots" content="noindex,nofollow">';

$allCategories = $categoryManager->getAllCategories(); // Pour affichage dans le footer

require_once '../views/404.php';
