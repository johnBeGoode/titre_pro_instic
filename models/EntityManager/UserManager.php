<?php 
namespace App\EntityManager;
use App\DBFactory;
use App\Entity\User;

class UserManager {

    private $db;

    public function __construct(){
        $this->db = DBFactory::getConnexion();
    }

    public function getUser(int $id){
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

    public function getAllRoles() {
        $sql = "SELECT DISTINCT role FROM users";
        $req = $this->db->query($sql);
        $roles = $req->fetchAll();

        return $roles;
    }
}