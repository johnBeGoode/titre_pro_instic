<?php
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
        }else if(empty($temp_name)) {
            $GLOBALS['userFormErrors'][] = "Le serveur php a rencontré un probleme lors de l'upload du fichier !";
        }else {
            move_uploaded_file($file['avatar']['tmp_name'], $uploadedFilePath);
            return '/public/images/avatars/' . $newUserId . '.' . $extension;
        }  
    }
    else {
        $GLOBALS['userFormErrors'][] = 'Format de l\'image '.$extension.' non accepté';
    }

    
    
}