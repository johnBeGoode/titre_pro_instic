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