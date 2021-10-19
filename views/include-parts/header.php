<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title_page; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/styles.css">
    <link rel="shortcut icon" type="image/x-icon" href="/public/images/icones/spiral.ico">
    <script src="https://kit.fontawesome.com/1f7564e144.js"></script>
    <meta name="description" content="<?= $desc_page; ?>">
    <?= isset($baliseMetaRobots) ? $baliseMetaRobots : null; ?>
</head>

<body>
    <header>
        <a href="/">
            <div id="logo_header">
                <img src="https://cdn.svgporn.com/logos/chromatic-icon.svg" alt="logo blog chromatic Siné" id="logo_image">
                <p>Chromatic Siné</p>
            </div>
        </a>
        <div id="menu">
            <nav>
                <ul>
                    <li><a href="/"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="/series"><i class="fas fa-tv"></i> Séries</a></li>
                    <li class="decalage"><a href="/podcasts"><i class="fas fa-podcast"></i> Podcasts</a></li>
                    <li class="decalage"><a href="/contact"><i class="fas fa-phone-alt"></i> Contact</a></li>
                </ul>
            </nav>
        </div>
        <div id="button">
            <?php
            if (isset($_SESSION['user']) && $_SESSION['user']->getRole() == 'Admin') : ?>
                <a href="/">Bienvenue <?= $_SESSION['user']->getName(); ?></a>
                <a href="/administration?page=movies" class="btn btn-dark">Admin</a>
            <?php
            elseif (isset($_SESSION['user']) && $_SESSION['user']->getRole() == 'User') : ?>
                <a href="/">Bienvenue <?= $_SESSION['user']->getName(); ?></a>
                <a href="/deconnexion" class="btn btn-danger">LogOut</a>
            <?php else : ?>
                <a href="/account-creating">Créer un compte</a>
                <a href="/connexion" class="btn btn-dark">Se connecter</a>
            <?php endif; ?>
        </div>
        <button id="menu-burger">
            <img src="/public/images/burger.svg" alt="menu burger">
        </button>
    </header>