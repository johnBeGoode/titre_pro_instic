<?php require_once 'include-parts/header.php'; ?>

<div id="page-admin">
    <h1>Page d'administration</h1>

    <?php if (isset($_SESSION['success'])) { ?>
                <div id="msg-success" class="alert alert-success">
                    <?= $_SESSION['success'] ?>
                </div>
    <?php } ?>

    <?php if (isset($_SESSION['erreurs'])) { ?>
                <div id="msg-success" class="alert alert-danger">
                    <?= implode('<br>', $_SESSION['erreurs']) ?>
                </div>
    <?php } ?>
  

    <nav>
        <ul class="tabs">
            <li><a href="administration?page=articles" class="<?= $linkActiveNav['articles']; ?>">Movies</a></li>
            <li><a href="administration?page=categories" class="<?= $linkActiveNav['categories']; ?>">Categories</a></li>
            <li><a href="administration?page=comments" class="<?= $linkActiveNav['comments']; ?>">Commentaires</a></li>
            <li><a href="administration?page=users" class="<?= $linkActiveNav['users']; ?>">Utilisateurs</a></li>
            <li><a href="/deconnexion">Deconnexion</a></li>
        </ul>
    </nav>

    <?php
    if (isset($content)) {
        require $content;
    }
    ?>
    
<?php require_once 'include-parts/footer.php'; ?>
