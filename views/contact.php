<?php require_once 'include-parts/header.php'; ?>

<div id="page-contact">
    <h1>Formulaire de contact</h1>
    <hr>
 
    <div id="msg_erreurs">
        <?= $_SESSION['errors'] ? implode('<br>', $_SESSION['errors']) : ''; ?>
    </div>
    <div id="msg_envoi">
        <?= $_SESSION['success'] ? 'Votre message a bien été envoyé' : '' ?>
    </div>
   

    <form action="" method="post">
        <label for="nom">Nom *</label><br>
        <input type="text" name="nom" id="nom" size="40" value="<?= isset($_SESSION['inputs']['nom']) ? $_SESSION['inputs']['nom'] : ''?>"> <span id="aide_nom"></span><br>

        <label for="mail">Adresse mail *</label><br>
        <input type="text" name="mail" id="mail" size="40" value="<?= isset($_SESSION['inputs']['mail']) ? $_SESSION['inputs']['mail'] : ''?>"> <span id="aide_mail"></span><br>

        <label for="objet">Objet *</label><br>
        <input type="text" name="objet" id="objet" size="40" value="<?= isset($_SESSION['inputs']['objet']) ? $_SESSION['inputs']['objet'] : ''?>"> <span id="aide_objet"></span><br>

        <label for="message">Votre message *</label> <span id="aide_message"></span><br>
        <textarea name="message" id="message" cols="80" rows="10"><?= isset($_SESSION['inputs']['message']) ? $_SESSION['inputs']['message'] : ''; ?></textarea><br><br>
        <input type="submit" class="btn btn-primary" value="ENVOYER">
    </form>
</div>

<?php require_once 'include-parts/footer.php'; ?>
