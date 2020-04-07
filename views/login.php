<?php require_once 'include-parts/header.php'; ?>

<!-- Message de non-connexion au compte -->
<?php if (isset($_SESSION['error'])): ?>
    <div id="msg-error" class="alert alert-danger text-center">
        <?= $_SESSION['error']; ?>
    </div>
 <?php endif ?>

 <!-- Message de création de compte ok -->
 <?php if (isset($_SESSION['success'])): ?>
    <div id="msg-success" class="alert alert-success text-center">
        <?= $_SESSION['success']; ?>
    </div>
 <?php endif; ?>

<div id="page-login">
    <form class="form-signin" action="" method="post">
        <h1 class="h3 mb-3 font-weight-normal text-center">Se connecter</h1>
        <input type="text" name="login" class="form-control" placeholder="Votre identifiant" required autofocus>
        <input type="password" name="password" class="form-control" placeholder="Votre mot de passe" required>
        <button class="btn btn-lg btn-primary btn-block mt-5" type="submit">Valider</button>
    </form>
    <?php require_once 'include-parts/footer.php'; ?>
</div>
