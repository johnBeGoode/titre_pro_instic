<?php 
namespace App\EntityManager;
use App\DBFactory;
use App\Entity\User;

class UserManager {

    private $db;

    public function __construct(){
        $this->db = DBFactory::getConnexion();
    }

    public function getUser($id){
        $sql = "SELECT * FROM users WHERE id = :id";
        $req = $this->db->prepare($sql);        
        $req->bindValue(':id', $id, \PDO::PARAM_INT);
        $req->execute();
        //$data = $req->fetchAll(\PDO::FETCH_OBJ);
        $data = $req->fetchObject('App\Entity\User');

        return $data;
    }

    public function getAllUsers() {
        $sql = "SELECT * FROM users ORDER BY date_registration DESC";
        $req = $this->db->query($sql);
        $datas = $req->fetchAll(\PDO::FETCH_CLASS, 'App\Entity\User');

        return $datas;
    }

    public function add($nom, $pass, $mail, $role) {
        $sql = "INSERT INTO users (name, password, role, email, date_registration) VALUES (:nom, :password, :role, :email, NOW())";
        $req = $this->db->prepare($sql);
        $req->bindValue(':nom', $nom);
        $req->bindValue(':password', $pass);
        $req->bindValue(':email', $mail);
        $req->bindValue(':role', $role);
        $req->execute();
    }

    public function update($nom, $password, $email, $role, $id) {
        $req = $this->db->prepare("UPDATE users SET name = :nom, password = :password, role = :role, email = :email WHERE id = :id");
        $req->bindValue(':name', $nom);
        $req->bindValue(':password', $password);
        $req->bindValue(':email', $email);
        $req->bindValue(':role', $role);
        $req->bindValue(':id', $id);
        $req->execute();
    }

    public function delete($id) {
        $this->db->exec("DELETE FROM users WHERE id = " . (int)$id);
    }
}