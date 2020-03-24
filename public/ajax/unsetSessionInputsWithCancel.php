<?php
session_start();

if (isset($_SESSION['inputs'])) {
    unset($_SESSION['inputs']);
}