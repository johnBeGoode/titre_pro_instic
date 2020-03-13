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
