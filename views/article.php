<?php require_once 'include-parts/header.php'; ?>


<div id="page-article">
    <section class="bande-annonce oblique-negative">
        <?php $movie->getVideoArticle(); ?>
    </section>

    <article class="oblique-positive">
        <div class="thumbnail">
             <img src="<?= $movie->getPicture(); ?>" alt="<?= $movie->getSlug(); ?>">
        </div>
        <div>
            <h2><?= $movie->getTitle(); ?></h2>
            <p>Ajouté le <?= $movie->getDateAdd(); ?></p><br>
            <p><span>Synopsis:</span>  <br> <?= $movie->getSynopsis(); ?></p>
        </div>
    </article>

    <section class="bloc-commentaires oblique-negative">
        <h3>Commentaires:</h3><br>
        <?php foreach($comments as $comment):
            $user = $comment->getUser();        
        ?>
        <div class="commentaire">
            <div class="avatar">
                <img width="50" height="50" src="<?= $user->getAvatar(); ?>" alt="avatar de <?= $user->getName(); ?>">
            </div>

            <div class="commentaire-content">
                <?= $comment->getDateAdd() .', '.  $user->getName(); ?>
                <p><?= $comment->getComment(); ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </section>

    <?php
    if (isset($_SESSION['user'])): ?>
        <section id="votre-commentaire">
            <img width="40" height="40" src="<?= $_SESSION['user']->getAvatar(); ?>" alt="avatar de <?= $_SESSION['user']->getName(); ?>">
            <form action="" method="post">
                <input type="text" name="comment" class="form-control" placeholder="Votre commentaire">
                <input type="submit" name="submit" value="OK">
            </form>
        </section>
    <?php else: ?>
        <a href="/connexion">Vous devez être connecté pour poster un commentaire.</a>
    <?php endif; ?>
  
</div>
<?php require_once 'include-parts/footer.php'; ?>