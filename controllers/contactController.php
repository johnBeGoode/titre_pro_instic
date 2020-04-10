<?php
use App\EntityManager\CategoryManager;

$categoryManager = new CategoryManager();
$allCategories = $categoryManager->getAllCategories();

$title_page = "Contact Chromatic SinémA";
$desc_page = "Page de contact pour toutes suggestions";

$jsFiles = ['form.js', 'contact.js'];
// $errors = [];
// $GLOBALS['userFormErrors'] = [];

// session_start();
if (isset($_POST['submit'])) {
    if (empty($_POST['nom'])) {
        $GLOBALS['userFormErrors'][] = "Vous n'avez pas renseigné votre nom";
    }
    if (empty($_POST['mail']) || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        $GLOBALS['userFormErrors'][] = "Vous n'avez pas renseigné un email valide";
    }
    if (empty($_POST['objet'])) {
        $GLOBALS['userFormErrors'][] = "Vous n'avez pas renseigné l'objet du message";
    }
    if (empty($_POST['message'])) {
        $GLOBALS['userFormErrors'][] = "Vous n'avez pas renseigné votre message";
    }



    if (!empty($GLOBALS['userFormErrors'])) {
        setErrorsAndSavePostInputs();
        header('Location: /contact');
    }
    else {
        $to = 'jonathan.martin084@gmail.com';
        $sujet = $_POST['nom'] . ' a contacté le site // OBJET: ' . $_POST['objet'];
        $message = $_POST['message'];
        $header = 'FROM: ' . $_POST['mail'];
        // supprime les antislashs car certains hébergeurs les bloque naturellement pour éviter des failles de sécurité
        $_POST['message'] = stripslashes($_POST['message']);
        mail($to, $sujet, $message, $header); // headers permet de rajouter des arguments à notre mail
        $_SESSION['success'] = 1;
        header('Location: /contact'); // si redirection impossible d'accéder à contact
    }
}

require_once '../views/' . $vue . '.php';
