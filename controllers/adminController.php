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

$nbMovies = $movieManager->count();

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
        $content = '../views/admin-parts/articles.php';

        
        if (isset($_GET['delete'])) {
            $id = htmlspecialchars($_GET['delete']);
            $movieManager->delete($id);
            header('Location: /administration?page=articles');
        }

        if (isset($_GET['update'])) {
            $id = htmlspecialchars($_GET['update']);
            $movie = $movieManager->getOne($id);
            //$movieManager->update($);
            // header('Location: /administration?page=articles');
        }

     } elseif ($getPage === 'comments') {
        $comments = $commentManager->getAllComments();
        $commentsLink = 'active';
        $content = '../views/admin-parts/comments.php';
     } elseif ($getPage === 'categories') {
        $categories = $categoryManager->getAllCategories();
        $categoriesLink = 'active';
        $content = '../views/admin-parts/categories.php';
     } elseif ($getPage === 'users') {
        $users = $userManager->getAllUsers();
        $usersLink = 'active';
        $content = '../views/admin-parts/users.php';
     } elseif ($getPage === 'mon_compte') {
        $accountLink = 'active';
     }
}
if (isset($_POST['type'])) {
    if ($_POST['type'] === 'film') {
        $titre = htmlspecialchars($_POST['titre']);
        $synopsis = htmlspecialchars($_POST['synopsis']);
        $isPublished = isset($_POST['publie']) ? 1 : 0;
        $movieManager->add($titre, $synopsis, $isPublished);
        header('Location: /administration?page=articles');
    }
}





    
require_once '../views/' . $vue . '.php'; 
