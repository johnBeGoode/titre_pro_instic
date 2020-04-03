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

    $username = $_POST['login'];
    // $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $password = $_POST['password'];

    $authentification = $userManager->userAuth($username, $password);
    $adminRole = $authentification[0]['rol'];
    $_SESSION['role'] = $adminRole; // Besoin pour retourner sur admin qd on est sur une autre page
    $_SESSION['nom'] = $username;

    if ($authentification) {
        if ($adminRole == 'Admin') {
            session_start();
            // On stocke une valeur pour que ça renvoie true
            $_SESSION['connected'] = 1;
            header('Location: /administration?page=articles');
            exit();
        }
        else {
            session_start();
            // On stocke une valeur pour que ça renvoie true
            $_SESSION['connected'] = 2;
            header('Location: /');
            exit();
        }
    }
    else {
        $error = 'Identifiants incorrects';
    }
}

// Pour retourner sur la partie admin qd on est sur une autre page
if (is_connected() && $_SESSION['role'] == 'Admin') {
    header('Location: /administration?page=articles');
    exit();
}
?>

<?php require_once '../views/' . $vue . '.php'; ?>