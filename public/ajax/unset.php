<?php
session_start();

if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
    echo "les notifs sont bien effacés";
}
