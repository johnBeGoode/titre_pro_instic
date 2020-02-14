<?php 
$error = null;
if (!empty($_POST['login']) && !empty($_POST['password'])) {
    if ($_POST['login'] === 'John' && $_POST['password'] === 'Doe') {
        session_start();
        // On stocke une valeur pour que ça renvoie true
        $_SESSION['connected'] = 1;
        header('Location: admin.php');
        exit();
    }
    else {
        $error = 'Identifiants incorrects';
    }
}

require 'functions/auth.php';
if (is_connected()) {
    header('Location: admin.php');
    exit();
}

require 'elements/head.php'; 
?>
 
 <?php if($error) { ?>
    <div class="alert alert-danger text-center">
        <?= $error; ?>
    </div>
 <?php } ?>
