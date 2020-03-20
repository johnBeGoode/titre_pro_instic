<?php
session_start();

if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
    echo 'Pas de répétitions des notifications';
}