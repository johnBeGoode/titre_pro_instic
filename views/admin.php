<?php require_once 'include-parts/header.php'; ?>

<div id="page-admin">
    <h1>Page d'administration</h1>

    <?php if (isset($_SESSION['success'])) { ?>
                <div id="msg-success" class="alert alert-success">
                    <?= $_SESSION['success'] ?>
                </div>
    <?php } ?>
    <?php if (isset($_SESSION['error'])) { ?>
                <div id="msg-error" class="alert alert-danger">
                    <?= $_SESSION['error'] ?>
                </div>
    <?php } ?>

    <nav>
        <ul class="tabs">
            <li><a href="administration?page=articles" class="<?= $articlesLink; ?>">Articles</a></li>
            <li><a href="administration?page=categories" class="<?= $categoriesLink; ?>">Categories</a></li>
            <li><a href="administration?page=comments" class="<?= $commentsLink; ?>">Commentaires</a></li>
            <li><a href="administration?page=users" class="<?= $usersLink; ?>">Utilisateurs</a></li>
            <li><a href="/deconnexion">Deconnexion</a></li>
        </ul>
    </nav>

    <?php
    if (isset($content)) {
        require $content;
    }
    ?>
    
<?php require_once 'include-parts/footer.php'; ?>
