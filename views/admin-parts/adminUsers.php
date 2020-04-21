<button type="button" class="btn btn-dark button-add-content">Add a user</button>

<div class="bg-my-modal">
    <form action="" method="post" enctype="multipart/form-data" class="form-add-content my-modal">
        <label>UserName</label><br>
        <!-- <input type="text" name="username" class="form-control" value="<?//= isset($_session['formInput']['username']) ? $_session['formInput']['username'] : ''; ?>"><br> -->
        <input type="text" name="username" class="form-control" value="<?= isset($user) ? $user->getName() : ''; ?>"><br>

        <label>Password</label><br>
        <input type="password" name="password1" class="form-control" value="<?= isset($user) ? $user->getPassword() : ''; ?>"><br>

        <label>Confirm Password</label><br>
        <input type="password" name="password2" class="form-control" value="<?= isset($user) ? $user->getPassword() : ''; ?>"><br>

        <label>Email</label><br>
        <input type="text" name="email" class="form-control" value="<?= isset($user) ? $user->getEmail() : ''; ?>"><br>
        
        <label>Avatar</label><br>
        <input type="file" name="avatar" accept="image/png, image/jpeg, impage/jpg"><br><br>

        <label>Rôle</label><br>
        <select name="role" id="role">
        <?php 
        $adminSelected = '';
        $userSelected = '';
        if (isset($user) && $user->getRole() == 'Admin') {
            $adminSelected = 'selected';
        } 
        else {
            $userSelected = 'selected'; 
        }?>
            <option value="Admin" <?= $adminSelected; ?>>Admin</option> 
            <option value="User"  <?= $userSelected; ?> >User</option> 
        </select>
        <br><br><br>
        <input type="submit" name="submit" class="btn btn-dark" value="<?= isset($_GET['action']) && $_GET['action'] == 'update' ? 'Mettre à jour' : 'Ajouter'; ?>">
        <input type="reset" class="btn btn-dark" value='Annuler'>
    </form>
</div>

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