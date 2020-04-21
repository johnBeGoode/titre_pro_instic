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
            <p class="date">Ajouté le <?= $movie->getDateAdd(); ?></p><br>
            <div id="categories">
                <?php foreach ($allCategories as $category): ?>
                        <?php if (in_array($category->getId(), $catForThisMovie)): ?>
                            <div class="category badge badge-dark"><?= $category->getName(); ?></div>
                        <?php endif; ?>   
                <?php endforeach; ?>
            </div>
            <p><span>Synopsis:</span> <br> <?= $movie->getSynopsis(); ?></p>
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

        <?php if (isset($_SESSION['user'])): ?>
            <div id="votre-commentaire">
                <?php
                $avatar = $_SESSION['user']->getAvatar();
                if ($avatar == '') {
                    $avatar = '/public/images/avatars/avatarpardefaut.jpg';
                } 
                ?>
                <img width="40" height="40" src="<?= $avatar; ?>" alt="avatar de <?= $_SESSION['user']->getName(); ?>">
                <form action="" method="post">
                    <input type="text" name="comment" class="form-control" placeholder="Votre commentaire">
                    <input type="submit" name="submit" class="btn btn-dark" value="Envoyer">
                </form>
            </div>
        <?php else: ?>
            <a id="linkConnectComment" href="/connexion">Vous devez être connecté pour poster un commentaire.</a>
        <?php endif; ?>
    </section>
</div>

<?php require_once 'include-parts/footer.php'; ?>