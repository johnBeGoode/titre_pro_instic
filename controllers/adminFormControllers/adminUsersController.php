<?php
use App\EntityManager\UserManager;
$userManager = new UserManager();

$users = $userManager->getAllUsers();
$linkActiveNav['users'] = 'active';
$content = '../views/admin-parts/usersAdminView.php';

if (isset($_POST['submit']) && $_POST['submit'] == 'Ajouter') {
    $userName = htmlspecialchars($_POST['username']);
    $password = '';
    $email = htmlspecialchars($_POST['email']);
    $role = $_POST['role'];
    $avatar = '';
    $erreurs = [];
    
    if (htmlspecialchars($_POST['password2']) !== htmlspecialchars($_POST['password1'])) {
        $erreurs[] = "Mot de passe différents";
    } else {
        $password = password_hash(htmlspecialchars($_POST['password2']), PASSWORD_DEFAULT);
    }

    if (!empty($_FILES['avatar']['name'])) {
        // var_dump($_FILES);
        // die('shit');
        uploadFile($_FILES, $erreurs);
        $avatar = '/public/images/avatars/' . $_FILES['avatar']['name'];
    }

    if (empty($erreurs)) {
        $userManager->add($avatar, $userName, $password, $email, $role);
        $_SESSION['success'] = 'Le nouvel utilisateur a bien été ajouté';
        header('Location: /administration?page=users');
    } else {
        $_SESSION['erreurs'] = $erreurs;
        $_SESSION['inputs'] = $_POST;
        header('Location: /administration?page=users');
    }
}

elseif (isset($_GET['action']) && $_GET['action'] == 'update') {
    $id = htmlspecialchars($_GET['id']);
    $user = $userManager->getUser($id);

    if (isset($_POST['submit']) && $_POST['submit'] == 'Mettre à jour') {
        $userName = htmlspecialchars($_POST['username']);
        $password = '';
        $email = htmlspecialchars($_POST['email']);
        $role = htmlspecialchars($_POST['role']);
        
        if (htmlspecialchars($_POST['password2']) !== htmlspecialchars($_POST['password1'])) {
            $_SESSION['error'] = 'Les mots de passe sont différents';
            $_SESSION['inputs'] = $_POST;
        }
        if (htmlspecialchars($_POST['password2']) == htmlspecialchars($_POST['password1'])) {
            $password = htmlspecialchars($_POST['password2']);
            $userManager->update($userName, $password, $email, $role, $id);
            $_SESSION['success'] = 'L\'utilisateur a été mis à jour';
            header('Location: /administration?page=users');
        }
    }
}
elseif (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = htmlspecialchars($_GET['id']);
    $userManager->delete($id);
    $_SESSION['success'] = 'L\'utilisateur a bien été supprimé';
    header('Location: /administration?page=users');
}

