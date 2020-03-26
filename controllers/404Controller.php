<?php
use App\EntityManager\CategoryManager;

$categoryManager = new CategoryManager();

$title_page = 'Erreur 404';
$desc_page = 'Erreur 404 -- page non trouvée';

$allCategories = $categoryManager->getAllCategories(); // Pour affichage dans le footer

require_once '../views/404.php';