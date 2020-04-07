<?php
error_reporting(E_ALL);

use App\EntityManager\MovieManager;
use App\EntityManager\CommentManager;
use App\EntityManager\CategoryManager;
use App\Entity\Comment;

$movieManager = new MovieManager();
$commentManager = new CommentManager();
$categoryManager = new CategoryManager();

$allCategories = $categoryManager->getAllCategories();
$movie = $movieManager->getOne($vars['id']);

$comments = $commentManager->getAllCommentsForMovie($vars['id']);


if ($vars['slug'] == $movie->getSlug() && ($movie->getIsPublished() || $movie->getMisEnAvant())) {
    $title_page = 'Article '. $movie->getTitle();
    $desc_page = "Fiche détaillé et commentaires utilisateurs";

    if (isset($_POST['submit'])) {
        $comment = $_POST['comment'];
        $movieId = $movie->getId();
        $userId = $_SESSION['user']->getId();
    
        $commentManager->add($comment, $movieId, $userId);
        header('Location: /article/' . $movie->getSlug() . '/' . $movieId);
    }

    require_once '../views/' . $vue . '.php';
}
else {    
    Router::badUrl();
}



