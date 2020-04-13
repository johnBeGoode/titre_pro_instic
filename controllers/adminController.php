<?php 
error_reporting(E_ALL);
use App\DBFactory;
use App\EntityManager\CategoryManager;

if (!isset($_SESSION['user']) || $_SESSION['user']->getRole() !== 'Admin') {
    header('Location: /connexion');
}

$categoryManager = new CategoryManager();

$title_page = "Administration Chromatic SinémA";
$desc_page = "Gestion de tous les articles, films, commentaires et utilisateurs du site";

$jsFiles = ['admin.js'];

$linkActiveNav = [
    'account' => null,
    'articles' => null,
    'comments' => null,
    'categories' => null,
    'users' => null
];

$baliseMetaRobots = '<meta name="robots" content="noindex">';

$allCategories = $categoryManager->getAllCategories(); // Pour affichage dans footer


if (isset($_GET['page'])) {
    $getPage = htmlspecialchars($_GET['page']);

    if ($getPage === 'articles') {
        require_once 'adminFormControllers/adminArticlesController.php';
    } 
    elseif ($getPage === 'comments') {
        require_once 'adminFormControllers/adminCommentsController.php';
    }
    elseif ($getPage === 'categories') {
        require_once 'adminFormControllers/adminCategoriesController.php';
    }
    elseif ($getPage === 'users') {
        require_once 'adminFormControllers/adminUsersController.php';
    }
}

require_once '../views/' . $vue . '.php'; 
