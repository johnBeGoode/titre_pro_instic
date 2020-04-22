<?php require_once 'include-parts/header.php'; ?>

<main id="page-categories">
    <h1><?= $genre; ?></h1> 
    
    <section class="oblique-positive">
        <?php foreach ($moviesByCategory as $movie): ?>
            <article class="oneMovie">
                <a href="/article/<?= $movie->getSlug(); ?>/<?= $movie->getId()?>"><img src="<?= $movie->getPicture(); ?>" alt=""></a><br>
                <a href="/article/<?= $movie->getSlug(); ?>/<?= $movie->getId()?>"><?= $movie->getTitle(); ?></a>
            </article>
        <?php endforeach ?>
    </section>
</main>

<?php require_once 'include-parts/footer.php'; ?>