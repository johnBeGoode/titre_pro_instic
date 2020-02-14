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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
      /* html, body {
  height: 100%;
} */

/* body {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
} */


.form-signin {
  width: 100%;
  max-width: 400px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}  
    </style>
    <title>Document</title>
</head>
<body>
    <div class="text-center">
        <form class="form-signin" action="" method="post">
        <!-- <img class="mb-4" src="/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
        <h1 class="h3 mb-3 font-weight-normal">Admin</h1>
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
    </div>

    <?php require 'elements/footer.php'; ?>
</body>
</html>

