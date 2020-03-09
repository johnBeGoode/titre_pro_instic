<?php require_once 'include-parts/header.php'; ?>

<?php if($error): ?>
    <div class="alert alert-danger text-center">
        <?= $error; ?>
    </div>
 <?php endif ?>

<div id="page-login">
    <form class="form-signin" action="" method="post">
        <h1 class="h3 mb-3 font-weight-normal text-center">Se connecter</h1>
        <input type="text" name="login" class="form-control" placeholder="Login" required autofocus>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block mt-5" type="submit">Connect</button>
    </form>
    <?php require_once 'include-parts/footer.php'; ?>
</div>
