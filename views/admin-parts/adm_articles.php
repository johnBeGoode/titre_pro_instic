<button type="button" id="button-add-content" class="btn btn-dark">Add a content</button>

<form action="" method="post" id="form-add-content">
    <label>Titre</label><br>
    <input type="text" class="form-control" name="titre" value="<?= isset($movie) ? $movie->getTitle() : ''; ?>"><br>

    <label>Synopsis</label><br>
    <textarea name="synopsis" id="synopsis" class="form-control"><?= isset($movie) ? $movie->getSynopsis() : ''; ?></textarea><br>

    <label>Image</label><br>
    <input type="file" name="image"><br><br>
    
    <label>Type</label><br>
    <select name="type" id="type">
        <option value="film">Film</option>
        <option value="serie">Série</option>
    </select><br><br>

    <label>Trailer</label><br>
    <input type="text" class="form-control" name="trailer" value="<?= isset($movie) ? $movie->getTrailer() : ''; ?>"><br>

    <label>Publié</label> <input type="checkbox" name="publie" <?= isset($movie) && $movie->getIsPublished() ? 'checked' : ''; ?>><br>

    <label>Mise en avant</label> <input type="checkbox" name="mis-en-avant"><br><br>

    <input type="submit" class="btn btn-primary" value="<?= isset($_GET['update']) ? 'Mettre à jour' : 'Ajouter'; ?>">
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
                    <a href="administration?page=articles&update=<?= $movie->getId(); ?>" class="btn btn-primary" title="Modifier"><i class="fas fa-pencil-alt"></i></a> 
                    <a href="administration?page=articles&delete=<?= $movie->getId(); ?>" class="btn btn-danger delete" title="Supprimer"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
</table>