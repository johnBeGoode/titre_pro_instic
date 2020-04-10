<?php
namespace App;

class DBFactory {

    private static $dbFile = __DIR__ . '/../config/database.json';

    public static function getConnexion() {
        $dbFile = file_get_contents(self::$dbFile);
        $dbDatas = json_decode($dbFile, true);
        if ($dbDatas['online'] == true) {
            $dbDatas = $dbDatas['prod'];
        }
        else {
            $dbDatas = $dbDatas['local'];
        }
        
        $db = new \PDO('mysql:host=' . $dbDatas['host'] . ';dbname=' .  $dbDatas['dbname'] . ';charset=utf8', $dbDatas['login'], $dbDatas['password']);

        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $db;
    }
}