<?php
$title_page = 'Page de connexion';
$desc_page = 'Identification pour accéder aux différentes sessions';
// -----TRAITEMENT ---

function is_connected():bool {
    // Si la session n'est pas débuté alors on la démarre
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    return !empty($_SESSION['connected']);
}

function force_user_connected():void {
    if (!is_connected()) {
        header('Location: /connexion');
        exit();
    }
}    


$error = null;

if (isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['password']) && !empty($_POST['password'])) {

    if ($_POST['login'] === 'John' && $_POST['password'] === 'Doe') {
        session_start();
        // On stocke une valeur pour que ça renvoie true
        $_SESSION['connected'] = 1;
        header('Location: /administration');
        exit();
    }
    else {
        $error = 'Identifiants incorrects';
    }
}

if (is_connected()) {
    header('Location: /administration');
    exit();
}
?>

<?php require_once '../views/' . $vue . '.php'; ?>