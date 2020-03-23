<?php 
error_reporting(E_ALL);
use App\EntityManager\MovieManager;
use App\EntityManager\CommentManager;
use App\EntityManager\UserManager;
use App\EntityManager\CategoryManager;
use App\Entity\Category;
use App\DBFactory;


$title_page = "Administration Chromatic SinémA";
$desc_page = "Gestion de tous les articles, films, commentaires et utilisateurs du site";

$movieManager = new MovieManager();
$commentManager = new CommentManager();
$categoryManager = new CategoryManager();
$userManager = new UserManager();
$category = new Category();


// $nbMovies = $movieManager->count();

$jsFiles = ['admin.js'];

$accountLink = null;
$articlesLink = null;
$commentsLink = null;
$categoriesLink = null;
$usersLink = null;

if (isset($_GET['page'])) {
    $getPage = htmlspecialchars($_GET['page']);

// ----- PAGE ARTICLES -----

    if ($getPage === 'articles') {
        $movies = $movieManager->getAllMovies();
        $categories = $categoryManager->getAllCategories();
        $articlesLink = 'active';
        $content = '../views/admin-parts/adm_articles.php';

        if (isset($_POST['submit']) && $_POST['submit'] == 'Ajouter') {
            $picture = null;
            $titre = htmlspecialchars($_POST['titre']);
            $synopsis = htmlspecialchars($_POST['synopsis']);
            $picture = null;
            $isPublished = isset($_POST['publie']) ? 1 : 0;
            $categories = $_POST['categories'];
            $trailer = htmlspecialchars($_POST['trailer']);
            $misEnAvant = isset($_POST['mis-en-avant']) ? 1 : 0;
            $movieManager->add($titre, $synopsis, $picture, $isPublished, $categories, $trailer, $misEnAvant);
            $_SESSION['success'] = 'Le film a bien été ajouté';
            header('Location: /administration?page=articles');
        } 
        elseif (isset($_GET['action']) && $_GET['action'] == 'update') {
            $id = htmlspecialchars($_GET['id']);
            $movie = $movieManager->getOne($id);
            $movieCategories = $movieManager->getCategoriesForAMovie($id);

            if (isset($_POST['submit']) && $_POST['submit'] == 'Mettre à jour') {
                $title = htmlspecialchars($_POST['titre']);
                $synopsis = htmlspecialchars($_POST['synopsis']);
                $picture = null;
                $categoriesId = $_POST['categories'];
                $trailer = htmlspecialchars($_POST['trailer']);
                $isPublished = isset($_POST['publie']) ? 1 : 0;
                $misEnAvant = isset($_POST['mis-en-avant']) ? 1 : 0;
                $movieManager->update($title, $synopsis, $picture, $categoriesId, $trailer, $isPublished, $misEnAvant, $id);
                $_SESSION['success'] = 'Le film a bien été mis à jour';
                header('Location: /administration?page=articles');
            }
        }
        elseif (isset($_GET['action']) && $_GET['action'] == 'delete') {
            $id = htmlspecialchars($_GET['id']);
            $movieManager->delete($id);
            $_SESSION['success'] = 'Le film a bien été supprimé';
            header('Location: /administration?page=articles');
        }
    } 
// -------------------------
// ----- PAGE COMMENTS -----

    elseif ($getPage === 'comments') {
        $movies = $movieManager->getAllMovies();
        $comments = $commentManager->getAllComments();
        $commentsLink = 'active';
        $content = '../views/admin-parts/adm_comments.php';

        if (isset($_POST['submit']) && $_POST['submit'] == 'Ajouter') {
            $comment = htmlspecialchars($_POST['comment']);
            $movieSelected = htmlspecialchars($_POST['movieList']);
            $commentManager->add($comment, $movieSelected); // $user définit par défaut à 1. A rajouter ou pas?
            $_SESSION['success'] = 'Votre commentaire a bien été ajouté';
            header('Location: /administration?page=comments');
        }
        elseif (isset($_GET['action']) && $_GET['action'] == 'update') {
            $id = htmlspecialchars($_GET['id']);
            $comment = $commentManager->getOne($id);

            if (isset($_POST['submit']) && $_POST['submit'] == 'Mettre à jour') {
                $comment = htmlspecialchars($_POST['comment']);
                $commentManager->update($comment, $id);
                $_SESSION['success'] = 'Votre commentaire a bien été mis à jour';
                header('Location: /administration?page=comments');
            }
        }
        elseif (isset($_GET['action']) && $_GET['action'] == 'delete') {
            $id = htmlspecialchars($_GET['id']);
            $commentManager->delete($id);
            $_SESSION['success'] = 'Le commentaire a bien été supprimé';
            header('Location: /administration?page=comments');
        }
    } 

// ---------------------------    
// ----- PAGE CATEGORIES -----

    elseif ($getPage === 'categories') {
        $categories = $categoryManager->getAllCategories();
        $categoriesLink = 'active';
        $content = '../views/admin-parts/adm_categories.php';
        
        if (isset($_POST['submit']) && $_POST['submit'] == 'Ajouter') {
                $nom = htmlspecialchars($_POST['nom']);
                $categoryManager->add($nom);
                $_SESSION['success'] = 'La catégorie a bien été ajoutée';
                header('Location: /administration?page=categories');
            } 
        elseif (isset($_GET['action']) && $_GET['action'] == 'update') {
            $id = htmlspecialchars($_GET['id']);
            $category = $categoryManager->getOne($id);

            if (isset($_POST['submit']) && $_POST['submit'] == 'Mettre à jour') {
                $nom = htmlspecialchars($_POST['nom']);
                $categoryManager->update($nom, $id);
                $_SESSION['success'] = 'La catégorie a bien été mis à jour';
                header('Location: /administration?page=categories');
            }
        }
        elseif (isset($_GET['action']) && $_GET['action'] == 'delete') {
            $id = htmlspecialchars($_GET['id']);
            $categoryManager->delete($id);
            $_SESSION['success'] = 'La catégorie a bien été supprimée';
            header('Location: /administration?page=articles');
        }
    } 

// ----------------------    
// ----- PAGE USERS -----

    elseif ($getPage === 'users') {
        $users = $userManager->getAllUsers();
        $usersLink = 'active';
        $content = '../views/admin-parts/adm_users.php';
        $roles = $userManager->getAllroles();
    }
}

require_once '../views/' . $vue . '.php'; 
