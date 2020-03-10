<?php
namespace App\EntityManager;
use App\DBFactory;
use App\Entity\Category;

class CategoryManager {

    private $db;


    public function __construct() {
        $this->db = DBFactory::getConnexion();
    }

    public function getAllCategories() {
        $sql = "SELECT * FROM categories";
        $req = $this->db->query($sql);
        $datas = $req->fetchAll(\PDO::FETCH_CLASS, 'App\Entity\Category');

        return $datas;
    }
}