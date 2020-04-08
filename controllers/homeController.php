<?php
error_reporting(E_ALL);
use App\EntityManager\MovieManager;
use App\EntityManager\CategoryManager;

$categoryManager = new CategoryManager();
$movieManager = new MovieManager();

$title_page = "Accueil Chromatic SinémA";
$desc_page = "Articles du jour avec les nouveaux films ouvert à débat";

$movies = $movieManager->getNbMovies(9);
$allCategories = $categoryManager->getAllCategories();

$jsFiles = ['home.js','caroussel.js']; // Tableau si on veut charger plusieurs fichiers JS sur une même page

$moviesMisEnAvant = $movieManager->getMoviesMisenAvant();


require_once '../views/' . $vue . '.php';
