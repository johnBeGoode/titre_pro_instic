<?php
use App\EntityManager\MovieManager;

$movieManager = new MovieManager();
$moviesByCategory = $movieManager->getMoviesByCategory($vars['genre']); // genre n'est pas un id
// var_dump($movieByCategory);




require_once '../views/' . $vue . '.php';