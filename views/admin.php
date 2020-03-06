<?php require_once 'include-parts/header.php'; ?>

<h1>Page d'administration</h1>

<nav>
    <ul>
        <li><a href="administration?page=mon_compte">Mon compte</a></li>
        <li><a href="administration?page=articles">Articles</a></li>
        <li><a href="administration?page=categories">Categories</a></li>
        <li><a href="administration?page=commentaires">Commentaires</a></li>
        <li><a href="administration?page=utilisateurs">Utilisateurs</a></li>
        <!-- <li><a href="administration?page=deconnexion">Deconnexion</a></li> -->
        <li><a href="/deconnexion">Deconnexion</a></li>
    </ul>
</nav>

<p>Il y a actuellement <?= $nbMovies ?></p>

<table id="tab-admin" class="table table-striped">
    <thead>
        <tr>
            <th>Image</th>
            <th>Titre</th>
            <th>Date d'ajout</th>
            <th>Synopsis</th>
        </tr>
    <thead>

    <tbody>
        <?php foreach ($movies as $movie): ?>
            <tr>
                <td><img src="<?= $movie->getpicture() ?>" alt=""></td>
                <td><?= $movie->getTitle() ?></td>
                <td><?= $movie->getDateAdd() ?></td>
                <td><?= substr($movie->getResume(),0,200) ?> ...</td>
                <!-- <td><a href="?modifier='<?//= $movie->getId() ?>'">Modifier</a> | <a href="?supprimer='<?//= $movie->getId() ?> '">Supprimer</a></td><br> -->
            </tr>
        <?php endforeach ?>
    </tbody>    
</table>

<?php require_once 'include-parts/footer.php'; ?>