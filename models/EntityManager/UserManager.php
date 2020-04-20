<?php 
namespace App\EntityManager;
use App\DBFactory;
use App\Entity\User;

class UserManager {

    private $db;

    public function __construct(){
        $this->db = DBFactory::getConnexion();
    }

    public function getUserbyName($username) {
        $sql = "SELECT * FROM users WHERE nom = :nom";
        $req = $this->db->prepare($sql);
        $req->bindValue(':nom', $username);
        $req->execute();

        return $req->fetchObject('App\Entity\User');
    } 
    
    public function getUser($id){
        $sql = "SELECT * FROM users WHERE id = :id";
        $req = $this->db->prepare($sql);        
        $req->bindValue(':id', $id, \PDO::PARAM_INT);
        $req->execute();

        return $req->fetchObject('App\Entity\User');
    }

    public function getAllUsers() {
        $sql = "SELECT * FROM users ORDER BY date_registration DESC";
        $req = $this->db->query($sql);
        
        return $req->fetchAll(\PDO::FETCH_CLASS, 'App\Entity\User');
    }

    public function add($avatar, $nom, $password, $email, $role) {
        try {
            $sql = "INSERT INTO users (avatar, nom, pass, rol, email, date_registration) VALUES (:avatar, :nom, :pass, :rol, :email, NOW())";
            $req = $this->db->prepare($sql);
            $req->bindValue(':avatar', $avatar);
            $req->bindValue(':nom', $nom);
            $req->bindValue(':pass', $password);
            $req->bindValue(':rol', $role);
            $req->bindValue(':email', $email);
            $req->execute();

            return $this->db->lastInsertId();
         }
         catch (\PDOException $e) {
            if ($e->errorInfo[1] == 1062) {
                $GLOBALS['userFormErrors'][] = 'Pseudo déjà existant, veuillez en choisir un autre !';
            }
            else {
                print($e->getMessage());
            }
        }  
    }

    public function update($avatar, $nom, $password, $email, $role, $id) {
        $sql = "UPDATE users SET avatar = :avatar, nom = :nom, pass = :pass, rol = :rol, email = :email WHERE id = :id";
        $req = $this->db->prepare($sql);
        $req->bindValue(':avatar', $avatar);
        $req->bindValue(':nom', $nom);
        $req->bindValue(':pass', $password);
        $req->bindValue(':email', $email);
        $req->bindValue(':rol', $role);
        $req->bindValue(':id', $id);
        $req->execute();
    }

    public function updateAvatar($id, $avatar) {
        $sql = "UPDATE users SET avatar = :avatar WHERE id = :id";
        $req = $this->db->prepare($sql);
        $req->bindValue(':avatar', $avatar);
        $req->bindValue(':id', $id);
        $req->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM users WHERE id = " . (int)$id;
        $this->db->exec($sql);
    }
}