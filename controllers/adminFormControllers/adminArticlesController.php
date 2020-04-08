<?php
use App\EntityManager\MovieManager;
$movieManager = new MovieManager();

$movies = $movieManager->getAllMovies();
$categories = $categoryManager->getAllCategories();

$linkActiveNav['articles'] = 'active'; 
$content = '../views/admin-parts/adminArticles.php';


if (isset($_POST['submit']) && $_POST['submit'] == 'Ajouter') {
    $titre = htmlspecialchars($_POST['titre']);
    $synopsis = htmlspecialchars($_POST['synopsis']);
    $isPublished = isset($_POST['publie']) ? 1 : 0;
    $categories = $_POST['categories'];
    $trailer = htmlspecialchars($_POST['trailer']);
    $misEnAvant = isset($_POST['mis-en-avant']) ? 1 : 0;

    if (!empty($_FILES['picture']['name'])) {
        $pictureUrl = uploadMoviePicture($_FILES);
        if (!empty($_FILES['misenavant']['name'])) {
            uploadMisEnAvant($_FILES);
        }
        $movieManager->add($titre, $synopsis, $pictureUrl, $isPublished, $categories, $trailer, $misEnAvant);
    }

    $_SESSION['success'] = 'Le nouveau film a bien été ajouté';
    header('Location: /administration?page=articles');
} 

// -------------------------
// MODIFIER

elseif (isset($_GET['action']) && $_GET['action'] == 'update') {
    $id = htmlspecialchars($_GET['id']);
    $movie = $movieManager->getOne($id);
    $movieCategories = $movieManager->getCategoriesForAMovie($id);
    
    if (isset($_POST['submit']) && $_POST['submit'] == 'Mettre à jour') {
        $title = htmlspecialchars($_POST['titre']);
        $synopsis = htmlspecialchars($_POST['synopsis']);
        $categoriesId = $_POST['categories'];
        $trailer = htmlspecialchars($_POST['trailer']);
        $isPublished = isset($_POST['publie']) ? 1 : 0;
        $misEnAvant = isset($_POST['mis-en-avant']) ? 1 : 0;
        $picture = $movie->getPicture();

        if (!empty($_FILES['picture']['name']) && !empty($_FILES['misenavant']['name'])) {
            uploadMisEnAvant($_FILES);
            $pictureUrl = uploadMoviePicture($_FILES);
            $movieManager->update($title, $synopsis, $pictureUrl, $categoriesId, $trailer, $isPublished, $misEnAvant, $id);
        }
        elseif (!empty($_FILES['picture']['name']) && empty($_FILES['misenavant']['name'])) {
            $pictureUrl = uploadMoviePicture($_FILES);
            $movieManager->update($title, $synopsis, $pictureUrl, $categoriesId, $trailer, $isPublished, $misEnAvant, $id);
        }
        elseif (!empty($_FILES['misenavant']['name']) && empty($_FILES['picture']['name']) ) {
            uploadMisEnAvant($_FILES);
            $movieManager->update($title, $synopsis, $picture, $categoriesId, $trailer, $isPublished, $misEnAvant, $id);
        }
        else {
            $movieManager->update($title, $synopsis, $picture, $categoriesId, $trailer, $isPublished, $misEnAvant, $id);
        }

        $_SESSION['success'] = 'Le film a été mis à jour';
        header('Location: /administration?page=articles');
    }
}

// -------------------------
// SUPPRIMER

elseif (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = htmlspecialchars($_GET['id']);
    $movieManager->delete($id);
    $_SESSION['success'] = 'Le film a été supprimé';
    header('Location: /administration?page=articles');
}
