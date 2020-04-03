<?php
use App\EntityManager\CategoryManager;
use App\EntityManager\UserManager;

$categoryManager = new CategoryManager();
$userManager = new UserManager();


$title_page = 'Page de connexion';
$desc_page = 'Identification pour accéder aux différentes sessions';

$allCategories = $categoryManager->getAllCategories();
$jsFiles = ['login.js'];
$error = null;


if (isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['password']) && !empty($_POST['password'])) {

    $user = $userManager->getUserbyName($_POST['login']);
    $authentification = password_verify($_POST['password'], $user->getPassword());

    if ($authentification) {
        
        $_SESSION['user'] = $user;
        $role = $user->getRole();

        if ($role == 'Admin') {
            header('Location: /administration?page=articles');
        }
        else {
            header('Location: /');
        }
    }
    else {
        $error = 'Identifiants incorrects';
    }
}
?>

<?php require_once '../views/' . $vue . '.php'; ?>