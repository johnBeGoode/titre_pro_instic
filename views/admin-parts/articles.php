<form action="" method="post">
    <label>Image</label><input type="file" name="image" value="<?= $movie->getPicture(); ?>"><br>
    <label>Titre</label><input type="text" name="titre" value="<?= $movie->getTitle(); ?>"><br>
    <label>Synopsis</label><textarea name="synopsis" id="" cols="30" rows="10"><?= $movie->getSynopsis(); ?></textarea><br>
    <label>Publié</label> <input type="checkbox" name="publie"><br><br><input type="text" value='film' name="type" hidden>

    <input type="submit" value="<?= isset($_GET['update']) ? 'Modifier' : 'Ajouter'; ?>">
</form>

<table class="admin-articles table table-striped">
    <thead>
        <tr>
            <th>Image</th>
            <th>Titre</th>
            <th>Date d'ajout</th>
            <th>Synopsis</th>
            <th>Nb de commentaires</th>
            <th>Publié</th>
            <th></th>
        </tr>
        <thead>

        <tbody>
            <?php foreach ($movies as $movie): ?>
            <tr>
                <td><img src="<?= $movie->getPicture() ?>" alt=""></td>
                <td><?= $movie->getTitle() ?></td>
                <td><?= $movie->getDateAdd() ?></td>
                <td class="synop"><?= substr($movie->getSynopsis(),0,200) ?> ...</td>
                <td></td>
                <td></td>
                <td>
                    <a href="administration?page=articles&update=<?= $movie->getId(); ?>" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a> 
                    <a href="administration?page=articles&delete=<?= $movie->getId(); ?>" class="btn btn-danger delete"><i class="fas fa-trash"></i></a>
                </td>
                  <!-- <td><a href="?modifier='<?//= $movie->getId() ?>'">Modifier</a> | <a href="?supprimer='<?//= $movie->getId() ?> '">Supprimer</a></td><br> -->
            </tr>
            <?php endforeach ?>
        </tbody>
</table>