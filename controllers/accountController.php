<?php
error_reporting(E_ALL);
use App\EntityManager\CategoryManager;
use App\EntityManager\UserManager;

$categoryManager = new CategoryManager();
$userManager = new UserManager();

$title_page = 'Créer un compte';
$desc_page = 'Création de compte utilisateur';
// $jsFiles = ['login.js'];
$jsFiles = ['hideNotif.js'];

$allCategories = $categoryManager->getAllCategories(); // Pour affichage dans footer

define("MIN_LENGTH_PASSWORD", 7);

if (isset($_POST['submit'])) {
    $username = verifUsernameInput($_POST['username']);
    $password = verifPasswordInput($_POST['password1'], $_POST['password2']);
    $email = verifEmailInput($_POST['email']);
    $avatar = '';
    $role = 'User';
   
    if (empty($GLOBALS['userFormErrors']) && $username && $password && $email) {
        $newUserId = $userManager->add($avatar, $username, $password, $email, $role);
        // retourne aussi le last userId
        if (!empty($_FILES['avatar']['name'])) {
            $avatarUrl = uploadFile($_FILES, $newUserId);
            if (empty($GLOBALS['userFormErrors'])) {
                $userManager->updateAvatar($newUserId, $avatarUrl);
            } 
            else {
                setErrorsAndSavePostInputs();
            }
        }

        if ($newUserId) {
            $_SESSION['success'] = 'Votre compte a bien été créé, veuillez vous connecter svp';
            header('Location: /connexion');
        } 
        else  {
            $GLOBALS['userFormErrors'][] = $newUserId;
            setErrorsAndSavePostInputs();
        }
    }
    else {
        setErrorsAndSavePostInputs();
    }
}

require_once '../views/' . $vue . '.php';