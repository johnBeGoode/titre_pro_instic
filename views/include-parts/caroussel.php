<div id="carouselExampleCaptions" class="carousel slide oblique-positive" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <?php foreach ($moviesMisEnAvant as $movieMisEnAvant):?>
            <div class="carousel-item">
                <a href="/article/<?= $movieMisEnAvant->getSlug(); ?>/<?= $movieMisEnAvant->getId()?>">
                    <img src="<?= '/public/images/caroussel/' . $movieMisEnAvant->getSlug() . '.jpg'; ?>" class="d-block w-100" alt="<?= $movieMisEnAvant->getSlug(); ?>">
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?= $movieMisEnAvant->getTitle(); ?></h5>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
        <!-- <div class="carousel-item active">
            <img src="public/images/caroussel/2987340.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="public/images/caroussel/3683424.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="http://fr.web.img5.acsta.net/carousels/20/02/19/10/50/5824455.jpg" class="d-block w-100"
                alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
            </div>
        </div> -->
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
