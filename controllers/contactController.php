<?php 
$title_page = "Contact Chromatic SinémA";
$desc_page = "Page de contact pour toutes suggestions";

session_start();
$errors = [];

if (empty($_POST['nom'])) {
    $errors['nom'] = "Vous n'avez pas renseigné votre nom";
}
if (empty($_POST['mail']) || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
    $errors['mail'] = "Vous n'avez pas renseigné un email valide";
}
if (empty($_POST['objet'])) {
    $errors['objet'] = "Vous n'avez pas renseigné l'objet du message";
}
if (empty($_POST['message'])) {
    $errors['message'] = "Vous n'avez pas renseigné votre message";
}

// On fait passer le tableau d'erreurs à la globale $_SESSION avec pour clé errors
$_SESSION['errors'] = $errors;
$_SESSION['inputs'] = $_POST;


function envoiMail() {
    $_SESSION['success'] = 1;
    $to = 'abc@gmail.com';
    $sujet = $_POST['nom'] . ' a contacté le site // OBJET: ' . $_POST['objet'];
    $message = $_POST['message'];
    $header = 'FROM: ' . $_POST['mail'];
    // supprime les antislashs car certains hébergeurs les bloque naturellement pour éviter des failles de sécurité
    $_POST['message'] = stripslashes($_POST['message']);
    mail($to, $sujet, $message, $header); // headers permet de rajouter des arguments à notre mail
    // header('location: /contact');
    unset($_SESSION['errors']);
    unset($_SESSION['inputs']);
}

// function enregisterMessage() {
//     try {
//         $db = new PDO('mysql:host=;dbname=;charset=utf8', '', '');
//     }
//     catch (Exception $e) {
//         die('Erreur:' . $e->getMessage());
//     }
    
//     $nom = htmlspecialchars($_POST['nom']);
//     $mail = htmlspecialchars($_POST['mail']);
//     $objet = htmlspecialchars($_POST['objet']);
//     $message = htmlspecialchars($_POST['message']);
    
    
//     $req = $db->prepare("INSERT INTO nom_table(nom_des_champs) VALUES(?, ?, ?, ?, NOW())");
//     $req->execute(array($nom, $mail, $objet, $message));
    
//     $req->closeCursor();
// }

$scriptJs = "/public/js/form.js";

require_once '../views/' . $vue . '.php';
