<?php 
error_reporting(E_ALL);
use App\EntityManager\MovieManager;
use App\EntityManager\CommentManager;
use App\EntityManager\UserManager;
use App\EntityManager\CategoryManager;


$title_page = "Administration Chromatic SinémA";
$desc_page = "Accès à tous les articles, films, commentaires et utilisateurs du site";

$movieManager = new MovieManager();
$commentManager = new CommentManager();
$categoryManager = new CategoryManager();
$userManager = new UserManager();

// $nbMovies = $movieManager->count();

// $scriptJS = '/public/js/admin.js';
$jsFiles = ['admin.js'];

$accountLink = null;
$articlesLink = null;
$commentsLink = null;
$categoriesLink = null;
$usersLink = null;

if (isset($_GET['page'])) {
    $getPage = htmlspecialchars($_GET['page']);

    if ($getPage === 'articles') {
        $movies = $movieManager->getAllMovies();
        $articlesLink = 'active';
        $content = '../views/admin-parts/adm_articles.php';
        $messageConfirmation = null;

        if (isset($_POST['submit']) && $_POST['submit'] == 'Ajouter') {
        // if (isset($_GET['action']) && $_GET['action'] == 'add' ) {
            $titre = htmlspecialchars($_POST['titre']);
            $synopsis = htmlspecialchars($_POST['synopsis']);
            // $picture = null; // fonctionne quand même si on supprime la ligne
            $isPublished = isset($_POST['publie']) ? 1 : 0;
            $trailer = htmlspecialchars($_POST['trailer']);
            $misEnAvant = isset($_POST['mis-en-avant']) ? 1 : 0;
            $movieManager->add($titre, $synopsis, $picture, $isPublished, $slug, $trailer, $misEnAvant);
            $_SESSION['success'] = 'Le film a bien été ajouté';
            header('Location: /administration?page=articles');
            // exit();
        } 
        elseif (isset($_GET['action']) && $_GET['action'] == 'update') {
            $id = htmlspecialchars($_GET['id']);
            $movie = $movieManager->getOne($id);

            if (isset($_POST['submit']) && $_POST['submit'] == 'Mettre à jour') {
                $title = htmlspecialchars($_POST['titre']);
                $synopsis = htmlspecialchars($_POST['synopsis']);
                // $picture = null; // fonctionne quand même si on supprime la ligne
                // $isPublished = isset($_POST['publie']) ? 1 : 0;
                // $slug = htmlspecialchars($_POST['slug']);
                // $trailer = htmlspecialchars($_POST['trailer']);
                // $misEnAvant = isset($_POST['mis-en-avant']) ? 1 : 0;
                $movieManager->update($title, $synopsis, $id);
                $_SESSION['success'] = 'Le film a bien été mis à jour';
                header('Location: /administration?page=articles');
                // exit();
            }
        }
        elseif (isset($_GET['action']) && $_GET['action'] == 'delete') {
            $id = htmlspecialchars($_GET['id']);
            $movieManager->delete($id);
            $_SESSION['success'] = 'Le film a bien été supprimé';
            header('Location: /administration?page=articles');
            // exit();
        }
    } 
    elseif ($getPage === 'comments') {
        $comments = $commentManager->getAllComments();
        $commentsLink = 'active';
        $content = '../views/admin-parts/adm_comments.php';
    } 
    elseif ($getPage === 'categories') {
        $categories = $categoryManager->getAllCategories();
        $categoriesLink = 'active';
        $content = '../views/admin-parts/adm_categories.php';
    } 
    elseif ($getPage === 'users') {
        $users = $userManager->getAllUsers();
        $usersLink = 'active';
        $content = '../views/admin-parts/adm_users.php';
    } 
    elseif ($getPage === 'mon_compte') {
        $accountLink = 'active';
    }
}

require_once '../views/' . $vue . '.php'; 
