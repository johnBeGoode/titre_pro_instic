<?php
use App\EntityManager\UserManager;
require_once '../functions/functions.php';

$userManager = new UserManager();

define("MIN_LENGTH_PASSWORD", 7);
$users = $userManager->getAllUsers();
$linkActiveNav['users'] = 'active';
$content = '../views/admin-parts/usersAdminView.php';

if (isset($_POST['submit']) && $_POST['submit'] == 'Ajouter') {
    // $userName = htmlspecialchars($_POST['username']);
    // $password = '';
    // $email = htmlspecialchars($_POST['email']);
    $role = $_POST['role'];
    $avatar = '';
    $GLOBALS['userFormErrors'] = [];
    
    $userName   = verifUserNameInput($_POST["username"]);
    $password   = verifPasswordInput($_POST["password1"], $_POST["password2"]);
    $email      = verifEmailInput($_POST['email']);
 
    if (count($GLOBALS['userFormErrors'])==0 && $userName && $password && $email) {        
        $userId = $userManager->add($avatar, $userName, $password, $email, $role); 

        if (!empty($_FILES['avatar']['name'])) {
            $avatarUrl = uploadFile($_FILES, $userId);             
            if(empty($GLOBALS['userFormErrors'])){
                $userManager->updateAvatar($userId, $avatarUrl);
            }else{
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

    // if (isset($_POST['submit']) && $_POST['submit'] == 'Mettre à jour') {
    //     $userName = htmlspecialchars($_POST['username']);
    //     $password = '';
    //     $email = htmlspecialchars($_POST['email']);
    //     $role = htmlspecialchars($_POST['role']);
        
    //     if (htmlspecialchars($_POST['password2']) !== htmlspecialchars($_POST['password1'])) {
    //         $_SESSION['error'] = 'Les mots de passe sont différents';
    //         $_SESSION['inputs'] = $_POST;
    //     }
    //     if (htmlspecialchars($_POST['password2']) == htmlspecialchars($_POST['password1'])) {
    //         $password = htmlspecialchars($_POST['password2']);
    //         $userManager->update($userName, $password, $email, $role, $id);
    //         $_SESSION['success'] = 'L\'utilisateur a été mis à jour';
    //         header('Location: /administration?page=users');
    //     }
    // }
}

// -------------------------
// SUPPRIMER


elseif (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = htmlspecialchars($_GET['id']);
    $userManager->delete($id);
    $_SESSION['success'] = 'L\'utilisateur a bien été supprimé';
    header('Location: /administration?page=users');
}

// function verifUsernameInput($username){
//     if (empty($username)) {
//         $GLOBALS['userFormErrors'][] = "Nom utilisateur vide !";
//     } elseif (strlen($username) < 4) {
//         $GLOBALS['userFormErrors'][] = "Le nom utilisateur doit contenir au moins 4 lettres !";
//     } else {
//         return $username;
//     }    
//     return false;
// }

// function verifPasswordInput($pass1, $pass2){
//     if ($pass1 !== $pass2) {
//         $GLOBALS['userFormErrors'][] = "Mot de passe différents";
//     } elseif (empty($pass1) && empty($pass2)) {
//         $GLOBALS['userFormErrors'][] = "Mot de passe à renseigner";
//     } else {
//         if(strlen($pass2)<MIN_LENGTH_PASSWORD){
//             $GLOBALS['userFormErrors'][] = "Le mot de passe doit contenir ".MIN_LENGTH_PASSWORD." caracteres minimum !";
//         }else{
//             return password_hash(htmlspecialchars($pass2), PASSWORD_DEFAULT);
//         }
//     }
//     return false;
// }

// function verifEmailInput($email){
//     if (empty($email)) {
//         $GLOBALS['userFormErrors'][] = "Adresse email vide !";
//     } elseif(!preg_match('/^[a-z_.\-0-9]+@[a-z.]+/',$email)) {
//         $GLOBALS['userFormErrors'][] = "Votre adresse email n'est pas valide !";
//     }else{
//         return $email;
//     }    
//     return false;
// }

// function setErrorsAndSavePostInputs(){
//     $_SESSION['erreurs'] = $GLOBALS['userFormErrors'];
//     $_SESSION['formInput'] = $_POST;      
// }
