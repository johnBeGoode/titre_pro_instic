<button type="button" class="btn btn-dark button-add-content">Add a user</button>

<form action="" method="post" class="form-add-content">
    <label>User</label><br>
    <input type="text" name="user" class="form-control"><br><br>

    <label>Rôle</label><br>
    <select name="roleList" id="roleList">
        <?php foreach ($roles as $role) { ?>
            <!-- <option value="<?//= $user-> getId(); ?>"><?//= $user->getRole(); ?></option> -->
            <option value="<?= $role['role']; ?>"><?= $role['role']; ?></option>
        <?php } ?>
    </select>
    <br><br><br>
    <input type="submit" name="submit" class="btn btn-primary" value="<?= isset($_GET['action']) && $_GET['action'] == 'update' ? 'Mettre à jour' : 'Ajouter'; ?>">
    <input type="reset" class="btn btn-primary" value='Annuler'>
</form>

<table class="admin-users table table-striped">
    <thead>
        <tr>
            <th>Avatar</th>
            <th>Nom</th>
            <th>Password</th>
            <th>Email</th>
            <th>Rôle</th>
            <th>Date d'enregistrement</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><img src="<?= $user->getAvatar() ?>" alt=""></td>
            <td><?= $user->getName() ?></td>
            <td><?= $user->getPassword() ?></td>
            <td><?= $user->getEmail() ?></td>
            <td><?= $user->getRole() ?></td>
            <td><?= $user->getDateRegistration() ?></td>
            <td class="icone-crud">
                <a href="administration?page=users&action=update&id=<?= $user->getId(); ?>" class="btn btn-primary" title="Modifier"><i class="fas fa-pencil-alt"></i></a> 
                <a href="administration?page=users&action=delete&id=<?= $user->getId(); ?>" class="btn btn-danger delete" title="Supprimer"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>