<?php require_once("include-parts/header.php"); ?>

<?php require_once 'include-parts/caroussel.php'; ?>

    <div id="home" class="oblique-negative">
        <section class="articles">
            <?php foreach($movies as $movie): ?>

            <article>
                <div class="thumbnail"><img src="<?= $movie->getPicture(); ?>" alt="<?= $movie->getSlug(); ?>"></div>
                <div class="article_content">
                    <h2><?= $movie->getTitle(); ?></h2>
                    <button class="btn-trailer"><i class="fas fa-video"></i></button>
                    <p><?= $movie->getDateAdd(); ?></p>
                    <p><?= nl2br(substr($movie->getResume(),0, 200)) . '...'; ?><br>
                        <a href="article/<?= $movie->getSlug(). "/" . $movie->getId()?>">Lire la suite</a>    
                    </p>
                </div>

                <?php $movie->getVideo(); ?> 
            </article>

            <?php endforeach; ?>
        </section>
    </div>

<?php require_once("include-parts/footer.php"); ?>
