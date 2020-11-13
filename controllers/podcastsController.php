<?php

use App\EntityManager\MovieManager;
use App\EntityManager\CategoryManager;

$categoryManager = new CategoryManager();
$movieManager = new MovieManager();

$title_page = "Podcasts Chromatic Siné";
$desc_page = "Une sélection des meilleurs podcasts de l'actualité cinéma/séries";

$allCategories = $categoryManager->getAllCategories();

require_once '../views/' . $vue . '.php';
