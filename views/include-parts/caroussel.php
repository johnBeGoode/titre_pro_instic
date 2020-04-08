<div id="carouselExampleCaptions" class="carousel slide oblique-positive" data-ride="carousel">
    <ol class="carousel-indicators">
    <?php for ($i=0; $i<count($moviesMisEnAvant); $i++):?>
        <li data-target="#carouselExampleCaptions" data-slide-to="<?= $i; ?>"></li> 
    <?php endfor; ?>
    </ol>
    <div class="carousel-inner">
        <?php foreach ($moviesMisEnAvant as $movieMisEnAvant):?>
            <div class="carousel-item">
                <a href="/article/<?= $movieMisEnAvant->getSlug(); ?>/<?= $movieMisEnAvant->getId()?>">
                    <img src="<?= '/public/images/caroussel/' . $movieMisEnAvant->getSlug() . '.jpg'; ?>" class="d-block w-100" alt="<?= $movieMisEnAvant->getTitle(); ?>">
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?= $movieMisEnAvant->getTitle(); ?></h5>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
