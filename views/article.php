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

<div class="bande-annonce">
    <?php $movie->getVideoArticle(); ?>
</div>

<div class="bloc-commentaire oblique-negative">
    <h3>Commentaires:</h3><br>
    <?php foreach($comments as $comment): ?>
        <div class="one-comment">
            <p>
                <span>
                    <?= $comment->getDateAdd(); ?>,
                    <!-- <?//= $comment->getUserId(); ?> -->
                    <?= $userName['name']; ?>:
                </span>
                <br>
                <?= $comment->getComment(); ?>
            </p>
        
            
        </div>
    <?php endforeach; ?>
</div>

<?php require_once("include-parts/footer.php"); ?>