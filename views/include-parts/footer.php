<footer>
    <div id="links">
        <div class="div_footer">
            <h5>Azerty</h5>
            <ul>
                <li><a href="#">Recrutement</a></li>
                <li><a href="#">Presse</a></li>
                <li><a href="/contact">Contact</a></li>
                <li><a href="#">Partenaires</a></li>
            </ul>
        </div>

        <div class="div_footer">
            <h5>Bzerty</h5>
            <ul>
                <li><a href="#">Références</a></li> 
                <li><a href="#">CGU</a></li>
                <li><a href="#">Mentions légales</a></li>
                <li><a href="#">A propos</a></li>
            </ul>
        </div>

        <div class="div_footer">
            <h5>Catégories</h5>
                <ul id="categories-footer">
                    <?php 
                    define('NB_PAR_COL', 4); // nb de catégories par colonne
                    $i = 0; 
                    foreach ($allCategories as $category):
                        if ($i % NB_PAR_COL == 0) {
                            if ($i > 0) {
                                echo '</div>';
                            }
                            echo '<div>'; 
                        } 
                    ?>
                        <li><a href="/categorie/<?= strtolower($category->getName()); ?>/<?= $category->getId(); ?>"><?= $category->getName(); ?></a></li> 
                    <?php
                        $i++;
                    endforeach; 
                    ?>
                    <!-- fermeture seconde div -->
                    </div> 
                </ul>
        </div>
    </div>

    <div id="reseau_social"> 
        <a href="#"><img id ="logofb" class="logo_rs" src="/public/images/ico_fb.png" alt="facebook"></a>
        <a href="#"><img class="logo_rs" src="/public/images/ico_in.png" alt="linkedin"></a>
        <a href="#"><img class="logo_rs" src="/public/images/ico_insta.png" alt="instagram"></a>
        <a href="#"><img class="logo_rs" src="/public/images/ico_twitter.png" alt="twitter"></a>
    </div>

    <div id="copyright">
        <img src="https://cdn.svgporn.com/logos/chromatic-icon.svg" alt="">
        Chromatic Sinéma, All Rights Reserved, 2020
    </div>
</footer>


<!-- Bootstrap -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


<?php 
if(isset($jsFiles)):
    for ($i=0; $i < count($jsFiles); $i++) {
        echo '<script src="/public/js/' .  $jsFiles[$i] . '"></script>';
    }
endif; 
?>

</body>
</html>
