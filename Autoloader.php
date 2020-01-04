<?php
// Dès que l'on instancie une classe, le fichier nécessaire est appelé, pas besoin de mettre des "require" tt le tps
class Autoloader {
     
    public static function autoload($classname) {
        require $classname . '.php';
    }

    public static function register() {
        spl_autoload_register(array('Autoloader', 'autoload'));
    }
}