<?php
error_reporting(E_ALL);
use App\EntityManager\MovieManager;
use App\EntityManager\CommentManager;
use App\Entity\Comment;


$movieManager = new MovieManager();
$commentManager = new CommentManager();

$movie = $movieManager->getOne($vars['id']);

$comments = $commentManager->getAllCommentsForMovie($vars['id']);

if ($vars['slug'] === $movie->getSlug() && $movie->getIsPublished()) {
    $title_page = 'Article '. $movie->getTitle();
    $desc_page = "Fiche détaillé et commentaires utilisateurs";
    require_once '../views/' . $vue . '.php';
} 
else {
    $title_page = 'Erreur 404, page non trouvée';
    $desc_page = "ERREUR ERREUR ERREUR";
    require_once '../views/404.php';
}
