<?php 
error_reporting(E_ALL);
use App\EntityManager\MovieManager;
use App\EntityManager\CommentManager;
use App\EntityManager\UserManager;
use App\EntityManager\CategoryManager;
use App\Entity\Category;
use App\DBFactory;


$title_page = "Administration Chromatic SinémA";
$desc_page = "Accès à tous les articles, films, commentaires et utilisateurs du site";

$movieManager = new MovieManager();
$commentManager = new CommentManager();
$categoryManager = new CategoryManager();
$userManager = new UserManager();
$category = new Category();



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
        $categories = $categoryManager->getAllCategories();
        $articlesLink = 'active';
        $content = '../views/admin-parts/adm_articles.php';

        if (isset($_POST['submit']) && $_POST['submit'] == 'Ajouter') {
        // if (isset($_GET['action']) && $_GET['action'] == 'add' ) {
            $movieId = DBFactory::getConnexion()->lastInsertId();
            $movieId++;
            $titre = htmlspecialchars($_POST['titre']);
            $synopsis = htmlspecialchars($_POST['synopsis']);
            $isPublished = isset($_POST['publie']) ? 1 : 0;
            $categ = $_POST['categories'];
            $trailer = htmlspecialchars($_POST['trailer']);
            $misEnAvant = isset($_POST['mis-en-avant']) ? 1 : 0;
            $movieManager->add($movieId, $titre, $synopsis, $picture, $isPublished, $categ, $slug, $trailer, $misEnAvant);
            $_SESSION['success'] = 'Le film a bien été ajouté';
            header('Location: /administration?page=articles');
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
            }
        }
        elseif (isset($_GET['action']) && $_GET['action'] == 'delete') {
            $id = htmlspecialchars($_GET['id']);
            $movieManager->delete($id);
            $_SESSION['success'] = 'Le film a bien été supprimé';
            header('Location: /administration?page=articles');
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
        

        if (isset($_POST['submit']) && $_POST['submit'] == 'Ajouter') {
            // if (isset($_GET['action']) && $_GET['action'] == 'add' ) {
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
