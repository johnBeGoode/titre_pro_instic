<?php
namespace App;

class DBFactory {

    private static $database = array(
        'hostname' => 'localhost',
        'database' => 'appjohn',
        'login' => 'root',
        'password' => ''
    );

    public static function getMysqlConnexionWithPDO() {
        $db = new \PDO('mysql:host=' . self::$database['hostname'] . ';dbname=' .  self::$database['database'] . ';charset=utf8', self::$database['login'], self::$database['password']);

        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $db;
    }
}