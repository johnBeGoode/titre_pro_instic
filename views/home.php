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
                        <a href="">Lire la suite</a>    
                    </p>
                </div>

                <!-- mettre mute=1 pour lancer l'autoplay (paramètre autoplay=1) -->
                <!-- <iframe src="https://www.youtube.com/embed/<?= $movie->getTrailer(); ?>?controls=0&autoplay=1&mute=1&loop=1&playlist=<?= $movie->getTrailer(); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="trailer"></iframe> -->

                  <?php $movie->getVideo(); ?>
            </article>

            <?php endforeach; ?>
        </section>
    </div>

<?php require_once("include-parts/footer.php"); ?>
