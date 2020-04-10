<?php
session_start();

if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
    unset($_SESSION['formInput']);
}

if (isset($_SESSION['erreurs'])) {
    unset($_SESSION['erreurs']);
}