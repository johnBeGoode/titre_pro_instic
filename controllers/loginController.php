<?php
use App\EntityManager\CategoryManager;
// require_once '../functions/functions.php';

$categoryManager = new CategoryManager();

$title_page = 'Page de connexion';
$desc_page = 'Identification pour accéder aux différentes sessions';

$allCategories = $categoryManager->getAllCategories();

$error = null;

// -----------------------------
// CONNEXION EN TANT QU'ADMIN

if (isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['password']) && !empty($_POST['password'])) {

    if ($_POST['login'] === 'John' && $_POST['password'] === 'Doe') {
        session_start();
        // On stocke une valeur pour que ça renvoie true
        $_SESSION['connected'] = 1;
        header('Location: /administration?page=articles');
        exit();
    }
    else {
        $error = 'Identifiants incorrects';
    }
}

if (is_connected()) {
    header('Location: /administration?page=articles');
    exit();
}

// -----------------------------
// CONNEXION EN TANT QU'ADMIN


?>



<?php require_once '../views/' . $vue . '.php'; ?>