<?php require_once 'include/header.php'; ?>
<?php require_once 'src/class/Manager/MoviesManager.php'; ?>

    <h2>Voici les dernières news publiées:</h2>
  <?php 
  $moviesManager = new MoviesManager($db);
  $movies = $moviesManager->getAllMovies();
  
  foreach($movies as $movie){
    echo $movie->getTitle();
  }
  
  ?>

<?php require_once 'include/footer.php'; ?>
