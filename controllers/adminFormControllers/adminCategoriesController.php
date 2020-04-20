<?php
$linkActiveNav['categories'] = 'active';
$content = '../views/admin-parts/adminCategories.php';

if (isset($_POST['submit']) && $_POST['submit'] == 'Ajouter') {
        $nom = htmlspecialchars($_POST['nom']);
        $categoryManager->add($nom);
        $_SESSION['success'] = 'La nouvelle catégorie a bien été ajoutée';
        header('Location: /administration?page=categories');
} 
elseif (isset($_GET['action']) && $_GET['action'] == 'update') {
    $id = htmlspecialchars($_GET['id']);
    $category = $categoryManager->getOne($id);

    if (isset($_POST['submit']) && $_POST['submit'] == 'Mettre à jour') {
        $nom = htmlspecialchars($_POST['nom']);
        $categoryManager->update($nom, $id);
        $_SESSION['success'] = 'La catégorie a été mise à jour';
        header('Location: /administration?page=categories');
    }
}
elseif (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = htmlspecialchars($_GET['id']);
    $categoryManager->delete($id);
    $_SESSION['success'] = 'La catégorie a été supprimée';
    header('Location: /administration?page=articles');
}

