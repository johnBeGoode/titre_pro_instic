<?php
use App\EntityManager\MovieManager;
use App\EntityManager\CategoryManager;

$movieManager = new MovieManager();
$categoryManager = new CategoryManager();

 // Affichage catégories dans footer
$allCategories = $categoryManager->getAllCategories();



// Liste films par catégories
$moviesByCategory = $movieManager->getMoviesByCategory($vars['id']);
$categ = $categoryManager->getOne($vars['id']);
$genre = ucfirst($vars['genre']);


if ($vars['genre'] == strtolower($categ->getName())) {
    $title_page = 'Chromatic Sinéma: catégorie ' . $categ->getName();
    $desc_page = 'Liste des films par ' . $categ->getName();
    require_once '../views/' . $vue . '.php';
}
else {
    Router::badUrl();
}