<?php
function is_connected():bool {
    // Si la session n'est pas débuté alors on la démarre
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    return !empty($_SESSION['connected']);
}

// ------------------------
// ------------------------

function force_user_connected():void {
    if (!is_connected()) {
        header('Location: /connexion');
        exit();
    }
}

// ------------------------
// ------------------------

function uploadFile($file, $newUserId) {
    // On récupère l'image du user
    $avatar = basename($file['avatar']['name']);
    // On récupère sa taille
    $size = filesize($file['avatar']['tmp_name']);
    $maxSize = 1000000;
    // On récupère l'extension du fichier
    $extension = pathinfo($avatar, PATHINFO_EXTENSION);
    $authorizedExtensions = ['jpg', 'jpeg', 'png'];
    $uploadedFilePath = '../public/images/avatars/' . $newUserId . '.' . $extension;

    $temp_name = $file['avatar']['tmp_name'];
    
    if (in_array($extension, $authorizedExtensions)) {
        if ($size > $maxSize) {
            $GLOBALS['userFormErrors'][] = 'Taille de l\'image trop grande, votre fichier fait '.$size.' octets alors que le maximum autorisé est de '.$maxSize.' octets !';
        }
        else if(empty($temp_name)) {
            $GLOBALS['userFormErrors'][] = "Le serveur php a rencontré un probleme lors de l'upload du fichier !";
        }
        else {
            move_uploaded_file($file['avatar']['tmp_name'], $uploadedFilePath);
            return '/public/images/avatars/' . $newUserId . '.' . $extension;
        }  
    }
    else {
        $GLOBALS['userFormErrors'][] = 'Format de l\'image '.$extension.' non accepté';
    }
}

// ------------------------
// ------------------------

function uploadMoviePicture ($file) {
    $pictureName = basename($file['picture']['name']);
    $tempPicture = $file['picture']['tmp_name'];
    $extension = pathinfo($pictureName, PATHINFO_EXTENSION);
    $authorizedExtensions = ['jpg', 'jpeg', 'png'];
    $uploadedFilePath = '../public/images/movies/' . $pictureName;
    // Enregistrement image sur le serveur
    if (in_array($extension, $authorizedExtensions)) {
        move_uploaded_file($tempPicture, $uploadedFilePath);
    }
    return '/public/images/movies/' . $pictureName;
}


// ------------------------
// ------------------------

function verifUsernameInput($username){
    if (empty($username)) {
        $GLOBALS['userFormErrors'][] = "Nom utilisateur vide !";
    } elseif (strlen($username) < 4) {
        $GLOBALS['userFormErrors'][] = "Le nom utilisateur doit contenir au moins 4 lettres !";
    } else {
        return $username;
    }    
    return false;
}

// ------------------------
// ------------------------

function verifPasswordInput($pass1, $pass2){
    if ($pass1 !== $pass2) {
        $GLOBALS['userFormErrors'][] = "Mot de passe différents";
    } elseif (empty($pass1) && empty($pass2)) {
        $GLOBALS['userFormErrors'][] = "Mot de passe à renseigner";
    } else {
        if(strlen($pass2)<MIN_LENGTH_PASSWORD){
            $GLOBALS['userFormErrors'][] = "Le mot de passe doit contenir ".MIN_LENGTH_PASSWORD." caracteres minimum !";
        }else{
            return password_hash(htmlspecialchars($pass2), PASSWORD_DEFAULT);
        }
    }
    return false;
}

// ------------------------
// ------------------------

function verifEmailInput($email){
    if (empty($email)) {
        $GLOBALS['userFormErrors'][] = "Adresse email vide !";
    } 
    elseif(!preg_match('/^[a-z_.\-0-9]+@[a-z.]+/',$email)) {
        $GLOBALS['userFormErrors'][] = "Votre adresse email n'est pas valide !";
    }
    else{
        return $email;
    }
      
    return false;
}

// ------------------------
// ------------------------

function setErrorsAndSavePostInputs(){
    $_SESSION['erreurs'] = $GLOBALS['userFormErrors'];
    $_SESSION['formInput'] = $_POST;    
}