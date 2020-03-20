<?php
session_start();

if (isset($_SESSION['success'])) {
    UNSET($_SESSION['success']);
}