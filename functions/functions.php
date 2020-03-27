<?php
function uploadFile($file, $erreurs) {
    // On récupère l'image du user
    $avatar = basename($file['avatar']['name']);
    // On récupère sa taille
    $size = filesize($file['avatar']['tmp_name']);
    $maxSize = 300000;
    // On récupère l'extension du fichier
    $extension = pathinfo($avatar, PATHINFO_EXTENSION);
    $authorizedExtensions = ['jpg', 'jpeg', 'png'];
    $uploadedFilePath = '../public/images/avatars/' . $avatar;

    if ($size < $maxSize) {
        $erreurs[] = 'Taille de l\'image trop grande';
    }

    if (in_array($extension, $authorizedExtensions)) {
        move_uploaded_file($file['avatar']['tmp_name'], $uploadedFilePath);
    }
    else {
        $erreurs[] = 'Format de l\'image non accepté';
    }

    return $erreurs;
}