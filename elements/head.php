<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <style>
        #connexion {
            position: absolute;
            right: 20px;
            width: 12%;
        }

        #admin {
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }
        #admin:hover {
            color: lightgrey;
        }
    </style>
    <title>
        <?php if(isset($title)) { ?>
                <?= $title; ?>
        <?php } else { ?>
                Mon blog perso
            <?php } ?>
    </title>
</head>
<body>
    <!-- <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
            <a href="#" class="navbar-brand">Mon site</a>
    </nav> -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index1.php">Blog SinemA</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Cinéma</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Série</a>
      </li>
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown link
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
    </ul>
    <div id="connexion">
        <a class="btn btn-primary mb-3 mb-md-0 ml-md-3" href="#">Connexion</a>
        <a href="admin.php" id="admin">Admin</a>
    </div>
  </div>
</nav>
