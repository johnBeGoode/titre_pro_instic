<?php 
namespace App\EntityManager;
use App\Entity\User;
use App\DBFactory;

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
        //$data = $req->fetchAll(\PDO::FETCH_OBJ, 'App\Entity\User');
        $data = $req->fetchObject('App\Entity\User');

        return $data;
    }

}