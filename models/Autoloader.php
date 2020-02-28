<?php 
namespace App;

class Autoloader{
    static function autoload(){
        spl_autoload_register(function ($class) {            
            $class = str_replace('App\\','',$class);
            $class = str_replace('\\','/',$class);            
            require  '../models/'.$class.'.php';
        });
    }

    
}
