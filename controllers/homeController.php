<?php
error_reporting(E_ALL);
use App\EntityManager\MovieManager;

$movieManager = new MovieManager();

$movies = $movieManager->getNbMovies(9);
$title_page = "Accueil Chromatic SinémA";
$desc_page = "Articles du jour avec les nouveaux films ouvert à débat";

require_once("../views/". $vue .".php");


