<?php

use App\EntityManager\MovieManager;
use App\EntityManager\CategoryManager;

$categoryManager = new CategoryManager();
$movieManager = new MovieManager();

$title_page = "Séries Chromatic Siné";
$desc_page = "Toutes les séries du moment et plus";

$allCategories = $categoryManager->getAllCategories();

require_once '../views/' . $vue . '.php';
