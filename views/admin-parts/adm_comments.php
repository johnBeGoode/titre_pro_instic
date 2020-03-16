<table class="admin-comments table table-striped">
    <thead>
        <tr>
            <th>Commentaires</th>
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
