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

        return $req->fetchAll(\PDO::FETCH_CLASS, 'App\Entity\Category');
    }
    
    public function getOne($id) {
        $sql = "SELECT * FROM categories WHERE id = :id";
        $req = $this->db->prepare($sql);
        $req->bindValue(':id', $id, \PDO::PARAM_INT);
        $req->execute();

        return $req->fetchObject('App\Entity\Category');
    }

    public function count() {
        $sql = "SELECT COUNT(id) FROM categories";
        
        return $this->db->query($sql)->fetchColumn();
    }

    public function add($nom) {
        $sql = "INSERT INTO categories (name) VALUES (:nom)";
        $req = $this->db->prepare($sql);
        $req->bindValue(':nom', $nom);
        $req->execute();
    }

    public function update($nom, $id) {
        $sql = "UPDATE categories SET name = :name WHERE id = :id";
        $req = $this->db->prepare($sql);
        $req->bindValue(':name', $nom);
        $req->bindValue(':id', $id);
        $req->execute();
    }
    
    public function delete($id) {
        $sql = "DELETE FROM categories WHERE id = " . (int)$id;
        $this->db->exec($sql);
    }
}