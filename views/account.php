<?php require_once 'include-parts/header.php'; ?>

<?php if (isset($_SESSION['erreurs'])) { ?>
        <div id="msg-error" class="alert alert-danger">
            <?= implode('<br>', $_SESSION['erreurs']) ?>
        </div>
<?php } ?>

    <div id="page-account">
        <form action="" method="post" enctype="multipart/form-data" class="form-signin">
            <h1 class="h3 mb-3 font-weight-normal text-center">Créer un nouveau compte</h1>

            <input type="text" name="username" class="form-control" placeholder="Pseudo" autofocus>

            <input type="password" name="password1" class="form-control" placeholder="Mot de passe">
            
            <input type="password" name="password2" class="form-control" placeholder="Confirmer votre mot de passe">

            <input type="text" name="email" class="form-control" placeholder="Email">
            
            <label>Choisissez votre avatar: <span>(facultatif)</span></label><br>
            <input type="file" name="avatar" accept="image/png, image/jpeg, impage/jpg">

            <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block mt-5" value="Créer">
        </form>
        <?php require_once 'include-parts/footer.php'; ?>
    </div>