<button type="button" class="btn btn-dark button-add-content">Add a content</button>

<form action="" method="post" enctype="multipart/form-data" class="form-add-content">
    <label>Titre</label><br>
    <input type="text" class="form-control" name="titre" value="<?= isset($movie) ? $movie->getTitle() : ''; ?>"><br>

    <label>Synopsis</label><br>
    <textarea name="synopsis" id="synopsis" class="form-control"><?= isset($movie) ? $movie->getSynopsis() : ''; ?></textarea><br>

    <label>Image</label><br>
    <input type="file" name="picture" accept="image/png, image/jpeg, image/jpg"><br><br>
    
    <label>Type</label><br>
    <select name="type" id="type">
        <option value="film">Film</option>
        <option value="serie">Série</option>
    </select><br><br>

    <label>Catégorie</label><br>
    <select name="categories[]" id="categories" multiple>
        <?php foreach ($categories as $category): ?>
            <?php 
            $attrSelected = '';
            if(in_array($category->getId(), $movieCategories)) {
                $attrSelected = 'selected';
            } ?>
            <option value="<?= $category->getId() ?>" <?= $attrSelected; ?>><?= $category->getName() ?></option>
        <?php endforeach ?>
    </select><br><br>

    <label>Trailer</label><br>
    <input type="text" class="form-control" name="trailer" value="<?= isset($movie) ? $movie->getTrailer() : ''; ?>"><br>

    <label>Publié</label> <input type="checkbox" name="publie" <?= isset($movie) && $movie->getIsPublished() ? 'checked' : ''; ?>><br>

    <label>Mise en avant</label> <input type="checkbox" name="mis-en-avant" <?= isset($movie) && $movie->getMisEnAvant() ? 'checked' : ''; ?>><br><br>

    <label>Image de mise en avant</label><br>
    <input type="file" name="misenavant" accept="image/png, image/jpeg, image/jpg"><br><br>

    <input type="submit" name="submit" class="btn btn-primary" value="<?= isset($_GET['action']) && $_GET['action'] == 'update' ? 'Mettre à jour' : 'Ajouter'; ?>">
    <input type="reset" class="btn btn-primary" value='Annuler'>
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
    </thead>

    <tbody>
        <?php foreach ($movies as $movie): ?>
        <tr>
            <td><img src="<?= $movie->getPicture() ?>" alt=""></td>
            <td><?= $movie->getTitle() ?></td>
            <td><?= $movie->getDateAdd() ?></td>
            <td class="synop"><?= substr($movie->getSynopsis(),0,202) ?> ...</td>
            <td><?= $movieManager->getNbCommentsForaMovie($movie->getId()); ?></td>
            <td><?= $movie->getIsPublished() || $movie->getMisEnAvant() ? 'oui' : 'non'; ?></td>
            <td class="icone-crud">
                <a href="administration?page=articles&action=update&id=<?= $movie->getId(); ?>" class="btn btn-primary" title="Modifier"><i class="fas fa-pencil-alt"></i></a> 
                <a href="administration?page=articles&action=delete&id=<?= $movie->getId(); ?>" class="btn btn-danger delete" title="Supprimer"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>