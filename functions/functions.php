<?php
function uploadFile($file, $erreurs, $newUserId) {
    // On récupère l'image du user
    $avatar = basename($file['avatar']['name']);
    // On récupère sa taille
    $size = filesize($file['avatar']['tmp_name']);
    $maxSize = 200000;
    // On récupère l'extension du fichier
    $extension = pathinfo($avatar, PATHINFO_EXTENSION);
    $authorizedExtensions = ['jpg', 'jpeg', 'png'];
    $uploadedFilePath = '../public/images/avatars/' . $newUserId . '.' . $extension;

   
    if (in_array($extension, $authorizedExtensions)) {
        if ($size > $maxSize) {
            $erreurs['upload'][] = 'Taille de l\'image trop grande';
        } else {
            move_uploaded_file($file['avatar']['tmp_name'], $uploadedFilePath);
        }  
    }
    else {
        $erreurs['upload'][] = 'Format de l\'image non accepté';
    }

    return ['erreurs' => $erreurs,
            'uploadFilePath' => '/public/images/avatars/' . $newUserId . '.' . $extension];
}