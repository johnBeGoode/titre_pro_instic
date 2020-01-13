<?php 
$error = null;
if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
    if ($_POST['pseudo'] === 'John' && $_POST['password'] === 'Doe') {
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

require 'elements/header.php'; 
?>
 
 <?php if($error) { ?>
    <div class="alert alert-danger">
        <?= $error; ?>
    </div>
 <?php } ?>
<form action="" method="post">
    <div class="form-group">
        <input type="text" name="pseudo" placeholder="Votre pseudo" class="form-control">
    </div>
    <div class="form-group">
        <input type="password" name="password" placeholder="Votre mot de passe" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>

<?php require 'elements/footer.php'; ?>