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
            <p><span>Synopsis:</span>  <br> <?= $movie->getResume(); ?></p>
        </div>
    </article>

    <section class="bloc-commentaires oblique-negative">
        <h3>Commentaires:</h3><br>
        <?php foreach($comments as $comment):
            $user = $comment->getUser();        
        ?>
        <div class="commentaire">
            <div class="avatar">
                <img width="50" height="50" src="https://cdn-media.rtl.fr/cache/2PpqxPwR6N73Rre1l6OYkA/880v587-0/online/image/2015/0115/7776220912_avatar-2-a-ete-repousse-a-2017.jpg" alt="">
            </div>

            <div class="commentaire-content">
                <?= $comment->getDateAdd() .', '.  $user->getName(); ?>
                (<a href="mailto:<?= $user->getEmail(); ?>"><?= $user->getEmail(); ?></a>)
                <p><?= $comment->getComment(); ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </section>
</div>
<?php require_once 'include-parts/footer.php'; ?>