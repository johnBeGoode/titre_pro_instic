// on affiche le message d'erreur

<?php
if (array_key_exists('errors', $_SESSION)) { ?> 
    <div id="msg_erreurs">
        <?php echo implode('<br>', $_SESSION['errors']); ?>
    </div>
<?php } ?>
<?php if (array_key_exists('success', $_SESSION)) { ?> 
    <div id="msg_envoi">
        Votre message a bien été envoyé !!
    </div>
<?php } ?>


<!-- --------------- -->
<!-- TRAITEMENT -->


<?php
// tableau qui contient les erreurs de remplissage de champs
$errors = [];

if (!array_key_exists('nom', $_POST) || $_POST['nom'] == '') {
    $errors['nom'] = "Vous n'avez pas renseigné votre nom !!";
}
if (!array_key_exists('mail', $_POST) || $_POST['mail'] == '' || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
    $errors['mail'] = "Vous n'avez pas renseigné un email valide !!";
}
if (!array_key_exists('objet', $_POST) || $_POST['objet'] == '') {
    $errors['objet'] = "Vous n'avez pas renseigné l'objet du message !!";
}
if (!array_key_exists('message', $_POST) || $_POST['message'] == '') {
    $errors['message'] = "Vous n'avez pas renseigné votre message !!";
}

session_start();

// s'il y a des erreurs on redirige vers la page principale pour correction
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['inputs'] = $_POST;
    header('location: /contact');
}
else {
    $_SESSION['success'] = 1; // on met = à 1 car vu qu'il y a une valeur, on peut dire que la clé success existe et on peut s'en servir dans cv.php
    $to = 'azerty123@gmail.com';
    $sujet = $_POST['nom'] . ' a contacté le site // OBJET: ' . $_POST['objet'];
    $message = $_POST['message'];
    $header = 'FROM: ' . $_POST['mail'];
    // supprime les antislashs car certains hébergeurs les bloque naturellement pour éviter des failles de sécurité
    $_POST['message'] = stripslashes($_POST['message']);
    mail($to, $sujet, $message, $header); // headers permet de rajouter des arguments à notre mail
    header('location: /contact');
}


// -----------------


try {
    $db = new PDO('mysql:host=;dbname=;charset=utf8', '', '');
}
catch (Exception $e) {
    die('Erreur:' . $e->getMessage());
}

$nom = htmlspecialchars($_POST['nom']);
$mail = htmlspecialchars($_POST['mail']);
$objet = htmlspecialchars($_POST['objet']);
$message = htmlspecialchars($_POST['message']);


$req = $db->prepare("INSERT INTO nom_table(nom_des_champs) VALUES(?, ?, ?, ?, NOW())");
$req->execute(array($nom, $mail, $objet, $message));

$req->closeCursor();
?>

<!-- ---------------- -->