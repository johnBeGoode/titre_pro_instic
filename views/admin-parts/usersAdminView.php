<button type="button" class="btn btn-dark button-add-content">Add a user</button>

<form action="" method="post" enctype="multipart/form-data" class="form-add-content">
    <label>UserName</label><br>
    <input type="text" name="username" class="form-control" value="<?= isset($_SESSION['inputs']['username']) ? $_SESSION['inputs']['username'] : isset($user) ? $user->getName() : ''; ?>"><br>

    <label>Password</label><br>
    <input type="password" name="password1" class="form-control"><br>

    <label>Confirm Password</label><br>
    <input type="password" name="password2" class="form-control"><br>

    <label>Email</label><br>
    <input type="text" name="email" class="form-control" value="<?= isset($_SESSION['inputs']['email']) ? $_SESSION['inputs']['email'] : isset($user) ? $user->getEmail() : ''; ?>"><br>
    
    <!-- Pour limiter la taille du fichier -->
    <input type="hidden" name="MAX_FILE_SIZE" value="200000" />

    <label>Avatar</label><br>
    <input type="file" name="avatar" accept="image/png, image/jpeg, impage/jpg"><br><br>

    <label>Rôle</label><br>
    <select name="role" id="role">
        <?php foreach ($users as $user) { ?>
            <?php
            $attrSelected = '';
            if (isset($_SESSION['inputs']['role'])) {
                $attrSelected = 'selected';
            } ?>
            <option value="<?= $user->getRole(); ?>" <?= $attrSelected; ?>><?= $user->getRole(); ?></option>
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
        <?php 
        foreach ($users as $user): 
            $avatar = $user->getAvatar();
            if ($avatar == '') {
                $avatar = '/public/images/avatars/avatarpardefaut.jpg';
            }
        ?>
        <tr>
            <td><img src="<?= $avatar; ?>" alt="avatar"></td>
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