<?php
session_start();

if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
    unset($_SESSION['inputs']);
    echo 'Pas de répétitions des notifications';
}

if (isset($_SESSION['erreurs'])) {
    unset($_SESSION['erreurs']);
}