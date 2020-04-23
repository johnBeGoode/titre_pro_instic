<button type="button" class="btn btn-dark button-add-content">Ajouter une catégorie</button>

<div class="bg-my-modal">
    <form action="" method='post' class='form-add-content my-modal'>
        <label>Nom</label><br>
        <input type="text" name="nom" class="form-control" value="<?= isset($category) ? $category->getName() : ''; ?>"><br><br>

        <input type="submit" name="submit" class="btn btn-dark" value="<?= isset($_GET['action']) && $_GET['action'] == 'update' ? 'Mettre à jour' : 'Ajouter'; ?>">
        <input type="reset" class="btn btn-dark" value='Annuler'>
    </form>
</div>

<table class="admin-categories table table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Nb de films</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $category): ?>
        <tr>
            <td><?= $category->getName() ?></td>
            <td><?= $movieManager->getNumberOfMoviesByCategory($category->getId()); ?></td>
            <td class="icone-crud">
                <a href="administration?page=categories&action=update&id=<?= $category->getId(); ?>" class="btn btn-primary" title="Modifier"><i class="fas fa-pencil-alt"></i></a> 
                <a href="administration?page=categories&action=delete&id=<?= $category->getId(); ?>" class="btn btn-danger delete" title="Supprimer"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>