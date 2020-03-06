<?php require_once 'include-parts/header.php'; ?>

<?php if($error): ?>
    <div class="alert alert-danger text-center">
        <?= $error; ?>
    </div>
 <?php endif ?>

<div id="page-login" class="text-center">
    <form class="form-signin" action="" method="post">
    <!-- <img class="mb-4" src="/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
    <h1 class="h3 mb-3 font-weight-normal">Se connecter</h1>
    <!-- <label for="inputEmail" class="sr-only">Login</label> -->
    <input type="text" name="login" class="form-control" placeholder="Login" required autofocus>
    <!-- <label for="inputPassword" class="sr-only">Password</label> -->
    <input type="password" name="password" class="form-control" placeholder="Password" required>
    <!-- <div class="checkbox mb-3">
        <label>
        <input type="checkbox" value="remember-me"> Remember me
        </label>
    </div> -->
    <button class="btn btn-lg btn-primary btn-block mt-5" type="submit">Connect</button>
    </form>

    <?php require_once 'include-parts/footer.php'; ?>
</div>


