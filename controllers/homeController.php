<?php
error_reporting(E_ALL);
use App\EntityManager\MovieManager;

$title_page = "Accueil Chromatic SinémA";
$desc_page = "Articles du jour avec les nouveaux films ouvert à débat";

$movieManager = new MovieManager();
$movies = $movieManager->getNbMovies(9);

$jsFiles = ['home.js']; // Tableau si on veut charger plusieurs fichiers JS sur une même page

require_once '../views/' . $vue . '.php';
