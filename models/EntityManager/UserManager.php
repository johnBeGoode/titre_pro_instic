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

    public function add($avatar, $nom, $password, $email, $role) {
        $sql = "INSERT INTO users (avatar, nom, pass, rol, email, date_registration) VALUES (:avatar, :nom, :pass, :rol, :email, NOW())";
        $req = $this->db->prepare($sql);
        $req->bindValue(':avatar', $avatar);
        $req->bindValue(':nom', $nom);
        $req->bindValue(':pass', $password);
        $req->bindValue(':email', $email);
        $req->bindValue(':rol', $role);
        $req->execute();

        $userId = $this->db->lastInsertId();
        return $userId;
    }

    public function update($avatar, $nom, $password, $email, $role, $id) {
        $req = $this->db->prepare("UPDATE users SET avatar = :avatar, nom = :nom, pass = :pass, rol = :rol, email = :email WHERE id = :id");
        $req->bindValue(':avatar', $avatar);
        $req->bindValue(':nom', $nom);
        $req->bindValue(':pass', $password);
        $req->bindValue(':email', $email);
        $req->bindValue(':rol', $role);
        $req->bindValue(':id', $id);
        $req->execute();
    }

    public function updateAvatar($id, $avatar) {
        $req = $this->db->prepare("UPDATE users SET avatar = :avatar WHERE id = :id");
        $req->bindValue(':avatar', $avatar);
        $req->bindValue(':id', $id);
        $req->execute();
    }

    public function delete($id) {
        $this->db->exec("DELETE FROM users WHERE id = " . (int)$id);
    }

    // public function distinctRoles() {
    //     $req = $this->db->query("SELECT DISTINCT rol FROM users");
    //     return $req->fetchAll();
    // }
}