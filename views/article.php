<?php require_once("include-parts/header.php"); ?>
<p><img src="<?= $movie->getPicture(); ?>" alt="<?= $movie->getSlug(); ?>"></p>
<h2><?= $movie->getTitle(); ?></h2>
<p><?= $movie->getDateAdd(); ?></p>

<?php $movie->getVideo(); ?>

<p><?= $movie->getResume(); ?></p>

<h3>Commentaires</h3>


<?php require_once("include-parts/footer.php"); ?>