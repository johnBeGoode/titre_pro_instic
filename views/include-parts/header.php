<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title_page; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/styles.css">
    <link rel="shortcut icon" type="image/x-icon" href="/public/images/spiral.ico">
    <script src="https://kit.fontawesome.com/1f7564e144.js"></script>
    <meta name="description" content="<?= $desc_page; ?>"/>
</head>
<body>
    <header>
        <a href="/">
            <div id="logo_header">
                <img src="https://cdn.svgporn.com/logos/chromatic-icon.svg" alt="logo blog" id="logo_image">
                <p>Chromatic SinemA</p>
            </div>
        </a>
        <div id="menu">
            <nav>
                <ul>
                    <li><a href="/"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href=""><i class="fas fa-tv"></i> Séries</a></li>
                    <li><a href=""><i class="fas fa-podcast"></i> Podcasts</a></li>
                    <li><a href="/contact"><i class="fas fa-phone-alt"></i> Contact</a></li>
                </ul>
            </nav>
        </div>
        <div id="button">
            <a href="<?= isset($_SESSION['connected']) ? '/' : '/account-creating'; ?>" class="<?= isset($_SESSION['connected']) ? null : 'btn btn-primary';?>"><?= isset($_SESSION['connected']) ? 'Bienvenue ' . $_SESSION['nom'] : 'Créer un compte'; ?></a>
            <a href="<?= isset($_SESSION['connected']) ? '/deconnexion' : '/connexion'; ?>" class="<?= isset($_SESSION['connected']) && $_SESSION['connected'] == 2 ? 'btn btn-danger' : 'btn btn-primary'; ?>"><?= isset($_SESSION['connected']) && $_SESSION['connected'] == 1 ? 'Admin' : isset($_SESSION['connected']) && $_SESSION['connected'] == 2 ? 'logOut' : 'Se connecter'; ?></a>
        </div>
    </header>
    
   