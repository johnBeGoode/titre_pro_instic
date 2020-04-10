<?php
use App\EntityManager\CommentManager;
use App\EntityManager\MovieManager;

$commentManager = new CommentManager();
$movieManager = new MovieManager();

$movies = $movieManager->getAllMovies();
$comments = $commentManager->getAllComments();
$linkActiveNav['comments'] = 'active'; 
$content = '../views/admin-parts/adminComments.php';

if (isset($_POST['submit']) && $_POST['submit'] == 'Ajouter') {
    $comment = htmlspecialchars($_POST['comment']);
    $movieSelected = htmlspecialchars($_POST['movieList']);
    $userId = $_SESSION['user']->getId(); // A CHECKER
    $commentManager->add($comment, $movieSelected, $userId);
    $_SESSION['success'] = 'Le nouveau commentaire a bien été ajouté';
    header('Location: /administration?page=comments');
}
elseif (isset($_GET['action']) && $_GET['action'] == 'update') {
    $id = htmlspecialchars($_GET['id']);
    $comment = $commentManager->getOne($id);

    if (isset($_POST['submit']) && $_POST['submit'] == 'Mettre à jour') {
        $comment = htmlspecialchars($_POST['comment']);
        $commentManager->update($comment, $id);
        $_SESSION['success'] = 'Le commentaire a été mis à jour';
        header('Location: /administration?page=comments');
    }
}
elseif (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = htmlspecialchars($_GET['id']);
    $commentManager->delete($id);
    $_SESSION['success'] = 'Le commentaire a été supprimé';
    header('Location: /administration?page=comments');
}

