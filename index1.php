<?php
require_once 'Autoloader.php';
Autoloader::register();

$db = DBFactory::getMysqlConnexionWithPDO();
$manager = new NewsManagerPDO($db);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Super Blog</title>
  </head>
  
  <body>
  <!-- <div id="header">
    <p><a href="admin.php">Accéder à l'espace d'administration</a></p>
    <h1>Mon super Blog</h1>
  </div> -->
  <?php require_once 'elements/head.php'; ?>

    <h2>Voici les dernières news publiées:</h2>
<?php
if (isset($_GET['id'])) {

  $news = $manager->getUnique((int) $_GET['id']);

  // Affichage news + com 1ère version
  // echo '<p>' . $news->getAuteur() . ', <em>'. $news->getDate_ajout()->format('d/m/Y H\hi') . '</em></p>
  // <h2>' . $news->getTitre() . '</h2><p>' . nl2br($news->getContenu()) . '</p>';

  // Affichage news + com 2ème version
  echo '<div class="news">';
  echo '<h3><strong>' . $news->getTitre() . '</strong><em> ' . $news->getDate_ajout()->format('d/m/Y  H\hi') . '</em>, publié par <strong>' . $news->getAuteur() . '</strong></h3>';
  echo '<p>' . nl2br($news->getContenu()) . '<br>';
  echo '</div>';
  
  if ($news->getDate_ajout() != $news->getDate_modif()) {

    echo '<p><small><em>Modifiée le ' . $news->getDate_modif()->format('d/m/Y à H\hi') . '</em></small></p>';
  }
}

else {
  // echo '<h2 style="text-align:center">Liste des 5 dernières news</h2>';
  
  foreach ($manager->getList(0, 5) as $news) {

    if (strlen($news->getContenu()) <= 200) {
      $contenu = $news->getContenu();
    }
    
    else {
      // Afficher une partie de la news si elle dépasse les 200 caractères
      $debut = substr($news->getContenu(), 0, 200);
      $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
      
      $contenu = $debut;
    }
    
    // Affichage news 1ère version:
    // echo '<h4><a href="?id=' . $news->getId() . '">' . $news->getTitre() . '</a></h4>' . "\n" .
    //      '<p>' . nl2br($contenu) . '</p>';

    // Affichage news 2eme version
    echo '<div class="news">';
    echo '<h3><strong>' . $news->getTitre() . '</strong><em> ' . $news->getDate_ajout()->format('d/m/Y  H\hi') . '</em>, publié par <strong>' . $news->getAuteur() . '</strong></h3>';
    echo '<p>' . nl2br($contenu) . '<br>';
    echo '<a href="?id=' . $news->getId() . '">Commentaires</a></p>';
    echo '</div>';

  }
}
?>

<?php require_once 'elements/footer.php'; ?>
</body>
</html>