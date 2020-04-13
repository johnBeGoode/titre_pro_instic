<button type="button" class="btn btn-dark button-add-content">Add a comment</button>

<div class="bg-my-modal">
    <form action="" method='post' class='form-add-content my-modal'>
        <label>Commentaire</label><br>
        <input type="text" name="comment" class="form-control" value="<?= isset($comment) ? $comment->getComment() : ''; ?>"><br>

        <label>Movie</label><br>
        <select name="movieList" id="movieList">
            <?php foreach ($movies as $movie) { ?>
                <?php
                $attrSelected = '';
                if (isset($comment) && $comment->getMovieId() === $movie->getId()) {
                    $attrSelected = 'selected';
                } ?>
                <option value="<?= $movie->getId(); ?>" <?= $attrSelected; ?>><?= $movie->getTitle(); ?></option>
            <?php } ?>
        </select><br><br><br>

        <input type="submit" name="submit" class="btn btn-dark" value="<?= isset($_GET['action']) && $_GET['action'] == 'update' ? 'Mettre à jour' : 'Ajouter'; ?>">
        <input type="reset" class="btn btn-dark" value='Annuler'>
    </form>
</div>

<table class="admin-comments table table-striped">
    <thead>
        <tr>
            <th>Commentaires</th>
            <th>Date d'ajout</th>
            <th>Movie</th>
            <th>User</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($comments as $comment): ?>
        <tr>
            <td><?= $comment->getComment() ?></td>
            <td><?= $comment->getDateAdd() ?></td>
            <td><?= $comment->getMovie()->getTitle() ?></td>
            <td><?= $comment->getUser()->getName() ?></td>
            <td class="icone-crud">
                <a href="administration?page=comments&action=update&id=<?= $comment->getId(); ?>" class="btn btn-primary" title="Modifier"><i class="fas fa-pencil-alt"></i></a> 
                <a href="administration?page=comments&action=delete&id=<?= $comment->getId(); ?>" class="btn btn-danger delete" title="Supprimer"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
