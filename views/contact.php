<?php require_once 'include-parts/header.php'; ?>

<div id="page-contact">
    <h1>Formulaire de contact</h1>
    <hr>
    <?php if (isset($_SESSION['erreurs'])): ?>
        <div id="msg-erreurs">
            <?= implode('<br>', $_SESSION['erreurs']); ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['success'])): ?>
        <div id="msg-envoi">Votre message a bien été envoyé !!</div>
    <?php endif; ?>

    <form action="" method="post" class="oblique-negative">
        <img src="/public/images/stamp.png" alt="">
        <label>Nom *</label><br>
        <input type="text" name="nom" id="nom" size="40" value="<?= isset($_SESSION['formInput']['nom']) ? $_SESSION['formInput']['nom'] : ''?>"> <span id="aide_nom"></span><br>

        <label>Adresse mail *</label><br>
        <input type="text" name="mail" id="mail" size="40" value="<?= isset($_SESSION['formInput']['mail']) ? $_SESSION['formInput']['mail'] : ''?>"> <span id="aide_mail"></span><br>

        <label>Objet *</label><br>
        <input type="text" name="objet" id="objet" size="40" value="<?= isset($_SESSION['formInput']['objet']) ? $_SESSION['formInput']['objet'] : ''?>"> <span id="aide_objet"></span><br>

        <label>Votre message *</label> <span id="aide_message"></span><br>
        <textarea name="message" id="message" cols="80" rows="10"><?= isset($_SESSION['formInput']['message']) ? $_SESSION['formInput']['message'] : ''; ?></textarea><br><br>
        <input type="submit" name="submit" class="btn btn-dark" value="ENVOYER">
    <!-- </form> -->
</div>

<?php require_once 'include-parts/footer.php'; ?>

