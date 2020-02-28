<?php
use App\EntityManager\MoviesManager;

$movieManager = new MoviesManager();
$movies = $movieManager->getAllMovies();
$title_page = "Accueil Chromatic SinémA";
$desc_page = "lorem rgdfghfdghfgdffh";

require_once("../views/".$vue.".php");


