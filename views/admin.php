<?php require_once 'include-parts/header.php'; ?>

<div id="page-admin">
    <h1>Page d'administration</h1>

    <nav>
        <ul>
            <li><a href="administration?page=mon_compte">Mon compte</a></li>
            <li><a href="administration?page=articles">Articles</a></li>
            <li><a href="administration?page=categories">Categories</a></li>
            <li><a href="administration?page=commentaires">Commentaires</a></li>
            <li><a href="administration?page=utilisateurs">Utilisateurs</a></li>
            <li><a href="/deconnexion">Deconnexion</a></li>
        </ul>
    </nav>

    <p>Il y a actuellement <?= $nbMovies ?> :</p>

    <table class="admin-articles table table-striped">
        <thead>
            <tr>
                <th>Image</th>
                <th>Titre</th>
                <th>Date d'ajout</th>
                <th>Synopsis</th>
                <th>Nb de commentaires</th>
                <th>Publié</th>
            </tr>
        <thead>

        <tbody>
            <?php foreach ($movies as $movie): ?>
                <tr>
                    <td><img src="<?= $movie->getPicture() ?>" alt=""></td>
                    <td><?= $movie->getTitle() ?></td>
                    <td><?= $movie->getDateAdd() ?></td>
                    <td><?= substr($movie->getResume(),0,200) ?> ...</td>
                    <!-- <td><a href="?modifier='<?//= $movie->getId() ?>'">Modifier</a> | <a href="?supprimer='<?//= $movie->getId() ?> '">Supprimer</a></td><br> -->
                </tr>
            <?php endforeach ?>
        </tbody>    
    </table>
    <br>
    <br>
    <table class="admin-comments table table-striped">
        <thead>
            <tr>
                <th>Commentaire</th>
                <th>Date d'ajout</th>
                <th>Article</th>
                <th>User</th>
            </tr>
        <thead>

        <tbody>
            <?php foreach ($comments as $comment): ?>
                <tr>
                    <td><?= $comment->getComment() ?></td>
                    <td><?= $comment->getDateAdd() ?></td>
                    <td><?= $comment->getMovieId() ?></td>
                    <td><?= $comment->getUser()->getName() ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>    
    </table>
    <br>
    <br>
    <table class="admin-users table table-striped">
        <thead>
            <tr>
                <th>Avatar</th>
                <th>Nom</th>
                <th>Password</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Date d'enregistrement</th>
            </tr>
        <thead>

        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><img src="<?= $user->getAvatar() ?>" alt=""></td>
                    <td><?= $user->getName() ?></td>
                    <td><?= $user->getPassword() ?></td>
                    <td><?= $user->getEmail() ?></td>
                    <td><?= $user->getRole() ?></td>
                    <td><?= $user->getDateRegistration() ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>    
    </table>
    <br>
    <br>
    <table class="admin-categories table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Nb de films</th>
            </tr>
        <thead>

        <tbody>
            <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?= $category->getName() ?></td>
                    <td><?= $category->getMoviesByCategory() ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>    
    </table>
</div>

<?php require_once 'include-parts/footer.php'; ?>