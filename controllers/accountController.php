<?php
error_reporting(E_ALL);
use App\EntityManager\CategoryManager;
use App\EntityManager\UserManager;
require_once '../functions/functions.php';

$categoryManager = new CategoryManager();
$userManager = new UserManager();

$title_page = 'Create a account';
$desc_page = 'For creating a new account';

$allCategories = $categoryManager->getAllCategories(); // Pour affichage dans footer


if (isset($_POST['submit'])) {
    $username = verifUsernameInput($_POST['username']);
    $password = verifPasswordInput($_POST['password1'], $_POST['password2']);
    $email = verifEmailInput($_POST['email']);
    $avatar = '';
    $GLOBALS['userFormErrors'] = [];
    $role = 'User';

    if (empty($GLOBALS['userFormErrors']) && $username && $password && $email) {
        $newUserId = $userManager->add($avatar, $username, $password, $email, $role); // retourne aussi le last userId
        
        if (!empty($_FILES['avatar']['name'])) {
            $avatarUrl = uploadFile($_FILES, $newUserId);
            if (empty($GLOBALS['userFormErrors'])) {
                updateAvatar($newUserId, $avatarUrl);
            } 
            else {
                setErrorsAndSavePostInputs();
            }
        }

        if ($newUserId) {
            $_SESSION['success'] = 'Votre compte a bien été créé, veuillez vous connecter svp';
        }
    }
    else {
        setErrorsAndSavePostInputs();
    }
    header('Location: /connexion');
}

require_once '../views/' . $vue . '.php';