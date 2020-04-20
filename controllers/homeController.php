<?php
error_reporting(E_ALL);
use App\EntityManager\MovieManager;
use App\EntityManager\CategoryManager;

$categoryManager = new CategoryManager();
$movieManager = new MovieManager();

$title_page = "Accueil Chromatic Siné";
$desc_page = "Articles du jour avec les nouveaux films ouvert à débat";

$jsFiles = ['home.js','caroussel.js'];

$movies = $movieManager->getNbMovies(9);
$allCategories = $categoryManager->getAllCategories();

$moviesMisEnAvant = $movieManager->getMoviesMisenAvant();

require_once '../views/' . $vue . '.php';
