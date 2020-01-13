<?php
function is_connected():bool {
    // Si la session n'est pas débuté alors on la démarre
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    return !empty($_SESSION['connected']);
}

function force_user_connected():void {
    if (!is_connected()) {
        header('Location: login.php');
        exit();
    }
}