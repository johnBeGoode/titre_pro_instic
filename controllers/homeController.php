<?php
error_reporting(E_ALL);
use App\EntityManager\MovieManager;

$movieManager = new MovieManager();
$movies = $movieManager->getNbMovies(9);
$title_page = "Accueil Chromatic SinémA";
$desc_page = "lorem rgdfghfdghfgdffh";

require_once("../views/".$vue.".php");


