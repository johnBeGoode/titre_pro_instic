<?php require_once 'include-parts/header.php'; ?>

<?php require_once 'include-parts/caroussel.php'; ?>

    <div id="home" class="oblique-negative">
        <section class="articles">
            <?php foreach($movies as $movie): 
                $urlArticle = 'article/' . $movie->getSlug() . '/' . $movie->getId();       
            ?>
            
            <article>
                <a href="<?= $urlArticle ?>">
                    <div class="thumbnail">
                        <img src="<?= $movie->getPicture(); ?>" alt="<?= $movie->getSlug(); ?>">
                    </div>
                </a>
                <div class="article-content">
                    <a href="<?= $urlArticle ?>">
                        <h2><?= $movie->getTitle(); ?></h2>
                    </a>
                    <button class="btn-trailer"><i class="fas fa-video"></i></button>
                    <p><?= $movie->getDateAdd(); ?></p>
                    <p><?= nl2br(substr($movie->getSynopsis(),0, 200)) . '...'; ?><br>
                        <a href="<?= $urlArticle ?>">Lire la suite</a>    
                    </p>
                </div>

                <!-- <?php $movie->getVideo(); ?>  -->
            </article>
        
            <?php endforeach; ?>
        </section>
    </div>

<?php require_once 'include-parts/footer.php'; ?>
