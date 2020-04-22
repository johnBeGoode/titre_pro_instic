<?php
use App\EntityManager\UserManager;

$userManager = new UserManager();

define("MIN_LENGTH_PASSWORD", 7);
$users = $userManager->getAllUsers();
$linkActiveNav['users'] = 'active';
$content = '../views/admin-parts/adminUsers.php';

if (isset($_POST['submit']) && $_POST['submit'] == 'Ajouter') {
    $role = $_POST['role'];
    $avatar = '/public/images/avatars/avatarpardefaut.jpg';
    $GLOBALS['userFormErrors'] = []; // Nécessaire de déclarer ??
    $userName   = verifUserNameInput($_POST["username"]);
    $password   = verifPasswordInput($_POST["password1"], $_POST["password2"]);
    $email      = verifEmailInput($_POST['email']);
 
    if (count($GLOBALS['userFormErrors']) == 0 && $userName && $password && $email) {        
        $userId = $userManager->add($avatar, $userName, $password, $email, $role); 

        if (!empty($_FILES['avatar']['name'])) {
            $avatarUrl = uploadFile($_FILES, $userId);             
            if (empty($GLOBALS['userFormErrors'])) {
                $userManager->updateAvatar($userId, $avatarUrl);
            }
            else {
                setErrorsAndSavePostInputs();                
            }                    
        }

        if($userId){
            $_SESSION['success'] = 'Le nouvel utilisateur a bien été ajouté'; 
        }
    } 
    else {
        setErrorsAndSavePostInputs(); 
    }
      
    header('Location: /administration?page=users'); 
}

// -------------------------
// MODIFIER

elseif (isset($_GET['action']) && $_GET['action'] == 'update') {
    $id = htmlspecialchars($_GET['id']);
    $user = $userManager->getUser($id);
    $avatar = $user->getAvatar();

    if (isset($_POST['submit']) && $_POST['submit'] == 'Mettre à jour') {
        $userName   = verifUserNameInput($_POST["username"]);
        $password   = verifPasswordInput($_POST["password1"], $_POST["password2"]);
        $email      = verifEmailInput($_POST['email']);
        $role       = $_POST['role'];

        if (empty($GLOBALS['userFormErrors'])) {
            if (!empty($_FILES['avatar']['name'])) {
                if ($avatar != '/public/images/avatars/avatarpardefaut.jpg') {
                    unlink('..' . $avatar); // gérer la suppression de l'ancienne image
                }
                $avatarUrl = uploadFile($_FILES, $id); 
                $userManager->update($avatarUrl, $userName, $password, $email, $role, $id);
            }
            else {
                $userManager->update($avatar, $userName, $password, $email, $role, $id);
            }
    
            $_SESSION['success'] = 'L\'utilisateur a été mis à jour';
        }
        else {
            setErrorsAndSavePostInputs();
        }
        
        header('Location: /administration?page=users');     
    }
}

// -------------------------
// SUPPRIMER


elseif (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = htmlspecialchars($_GET['id']);
    $userManager->delete($id);
    $_SESSION['success'] = 'L\'utilisateur a bien été supprimé';
    header('Location: /administration?page=users');
}
