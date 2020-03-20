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
    
    public function getOne($id) {
        $sql = "SELECT * FROM categories WHERE id = :id";
        $req = $this->db->prepare($sql);
        $req->bindValue(':id', (int)$id, \PDO::PARAM_INT);
        $req->execute();
        $category = $req->fetchObject('App\Entity\Category');

        return $category;
    }

    public function count() {
        return $this->db->query("SELECT COUNT(id) FROM categories")->fetchColumn();
    }

    public function add($nom) {
        $sql = "INSERT INTO categories (name) VALUES (:nom)";
        $req = $this->db->prepare($sql);
        $req->bindValue(':nom', $nom);
        $req->execute();
    }

    public function update($nom, $id) {
        $req = $this->db->prepare("UPDATE categories SET name = :name WHERE id = :id");

        $req->bindValue(':name', $nom);
        $req->bindValue(':id', $id);
        $req->execute();
    }

    public function delete($id) {
        $this->db->exec("DELETE FROM categories WHERE id = " . (int)$id);
    }

    public function getMoviesByCategory() {
        
    }
}