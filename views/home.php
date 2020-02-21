<?php require_once("include-parts/header.php"); ?>

    <div id="home">
        <section class="articles">
            <?php foreach($movies as $movie): ?>

            <article>
                <div class="thumbnail"><img src="<?= $movie->getPicture(); ?>" alt="<?= $movie->getSlug(); ?>"></div>
                <div class="article_content">
                    <h2><?= $movie->getTitle(); ?></h2>
                    <p><?= $movie->getDate_add(); ?></p>
                    <p><?= nl2br(substr($movie->getResume(),0, 200)) . '...'; ?><br>
                        <a href="">Lire la suite</a>    
                    </p>
                </div>
            </article>

            <?php endforeach; ?>
        </section>
    </div>

<?php require_once("include-parts/footer.php"); ?>

  