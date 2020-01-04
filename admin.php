<?php
require('Autoloader.php');
Autoloader::register();

$db = DBFactory::getMysqlConnexionWithPDO();
$manager = new NewsManagerPDO($db);

if (isset($_GET['modifier'])) {
    $news = $manager->getUnique((int)$_GET['modifier']);
}

if (isset($_GET['supprimer'])) {
    $manager->delete((int)$_GET['supprimer']);
    $message = 'La news a bien été supprimé';
}

if (isset($_POST['auteur'])) {
    $news = new News([
        'auteur' => $_POST['auteur'],
        'titre' => $_POST['titre'],
        'contenu' => $_POST['contenu']
    ]);


    if (isset($_POST['id'])) {
        $news = setId($_POST['id']);
    }

    if (isset($news->isvalid)) {
        $manager->save($news);
        $message = $news->isNew() ? 'La news a bien été ajoutée' : 'La news a bien été modifiée';
    }
    else {
        $erreurs = $news->erreurs();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>
        table, td {
            border: 1px solid black;
        }
        
        table {
            margin:auto;
            text-align: center;
            border-collapse: collapse;
        }
        
        td {
            padding: 3px;
        }
    </style>
</head>
<body>
    <p><a href="index1.php">Accéder à l'accueil du site</a></p>
        
        <form action="admin.php" method="post">
        <p style="text-align: center">
    <?php
    if (isset($message)) {
        echo $message, '<br />';
    }
    ?>

    <?php if (isset($erreurs) && in_array(News::AUTEUR_INVALIDE, $erreurs)) echo 'L\'auteur est invalide.<br />'; ?>
    Auteur : <input type="text" name="auteur" value="<?php if (isset($news)) echo $news->getAuteur(); ?>" /><br />
    
    <?php if (isset($erreurs) && in_array(News::TITRE_INVALIDE, $erreurs)) echo 'Le titre est invalide.<br />'; ?>
    Titre : <input type="text" name="titre" value="<?php if (isset($news)) echo $news->getTitre(); ?>" /><br />
    
    <?php if (isset($erreurs) && in_array(News::CONTENU_INVALIDE, $erreurs)) echo 'Le contenu est invalide.<br />'; ?>
    Contenu :<br /><textarea rows="8" cols="60" name="contenu"><?php if (isset($news)) echo $news->getContenu(); ?></textarea><br />


    <?php
    if(isset($news) && !$news->isNew())
    {
    ?>
            <input type="hidden" name="id" value="<?= $news->getId() ?>" />
            <input type="submit" value="Modifier" name="modifier" />
    <?php
    }
    else
    {
    ?>
            <input type="submit" value="Ajouter" />
    <?php
    }
    ?>
        </p>
        </form>
        
        <p style="text-align: center">Il y a actuellement <?= $manager->count() ?> news. En voici la liste :</p>
        
        <table>
        <tr><th>Auteur</th><th>Titre</th><th>Date d'ajout</th><th>Dernière modification</th><th>Action</th></tr>
    <?php
    foreach ($manager->getList() as $news)
    {
    echo '<tr><td>', $news->getAuteur(), '</td><td>', $news->getTitre(), '</td><td>', $news->getDate_ajout()->format('d/m/Y à H\hi'), '</td><td>', ($news->getDate_ajout() == $news->getDate_modif() ? '-' : $news->getDate_modif()->format('d/m/Y à H\hi')), '</td><td><a href="?modifier=', $news->getId(), '">Modifier</a> | <a href="?supprimer=', $news->getId(), '">Supprimer</a></td></tr>', "\n";
    }
    ?>
    </table>
</body>
</html>



