<?php
session_start();
unset($_SESSION['connected']);
header('Location: index1.php');