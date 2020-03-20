<?php
session_start();
unset($_SESSION['connected']);
addNotif("alert", 'Vous vous etes bien deconnecté !', "fa-door-open");
header('Location: /connexion');