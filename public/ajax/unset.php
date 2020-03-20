<?php
session_start();

if (isset($_SESSION['success'])) {
    $_SESSION['success'] = array();
    echo "les notifs sont bien effacés";
}
