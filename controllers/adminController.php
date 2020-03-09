<?php 
use App\EntityManager\MovieManager;


$title_page = "Administration Chromatic SinémA";
$desc_page = "Accès a tous les articles,films et commentaires du site";


$movieManager = new MovieManager();
$nbMovies = $movieManager->count();
$movies = $movieManager->getAllMovies();
?>

<?php require_once '../views/' . $vue . '.php'; ?>