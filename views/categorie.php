<?php require_once 'include-parts/header.php'; ?>
<!-- mettre le titre dynamiquement -->

<div id="page-categories">

    <h1><?= $genre; ?></h1> 

    <?php foreach ($moviesByCategory as $movie): ?>
        <div class="oneMovie">
            <a href="/article/<?= $movie->getSlug(); ?>/<?= $movie->getId()?>"><img src="<?= $movie->getPicture(); ?>" alt=""></a>
            <p><a href="/article/<?= $movie->getSlug(); ?>/<?= $movie->getId()?>"><?= $movie->getTitle(); ?></a></p>
        </div>
    <?php endforeach ?>

</div>

<?php require_once 'include-parts/footer.php'; ?>