<?php
error_reporting(E_ALL);
use App\EntityManager\MovieManager;

$title_page = "Accueil Chromatic SinémA";
$desc_page = "Articles du jour avec les nouveaux films ouvert à débat";

$movieManager = new MovieManager();
$movies = $movieManager->getNbMovies(9);

require_once("../views/". $vue .".php");


