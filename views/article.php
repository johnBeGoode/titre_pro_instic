<?php require_once("include-parts/header.php"); ?>

<div class="content oblique-positive">
    <div>
        <p class="thumbnail"><img src="<?= $movie->getPicture(); ?>" alt="<?= $movie->getSlug(); ?>"></p>
    </div>
    <div>
        <h2><?= $movie->getTitle(); ?></h2>
        <p>Ajouté le <?= $movie->getDateAdd(); ?></p><br>
        <p><span>Synopsis:</span>  <br> <?= $movie->getResume(); ?></p>
    </div>
</div>

<!-- Déjà une div avec la class trailer -->
<!-- <?//php $movie->getVideo(); ?> -->
<div class="bande-annonce">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $movie->getTrailer() ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>

<div class="bloc-commentaire">
    <h3>Commentaires:</h3>
    <div>
        <?php foreach($comments as $comment): ?>
            <p>
                <?= $comment->getDateAdd(); ?>
                <?= $comment->getUserId(); ?><br>
            </p>
            <p>
                <?= $comment->getComment(); ?>
            </p>
        <?php endforeach; ?>
    </div>
</div>

<?php require_once("include-parts/footer.php"); ?>