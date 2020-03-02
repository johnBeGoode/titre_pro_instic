<?php
namespace App\EntityManager;
use App\DBFactory;
use App\Entity\Movie;


class MovieManager {

    // attribut contenant l'instance représentant la base de données
    protected $db;


    public function __construct() {
        $this->db = DBFactory::getConnexion();
    }

    public function add(Movie $movie) {
        $req = $this->db->prepare("INSERT INTO movies (title, resume, date_add, picture, is_published, slug) VALUES (:title, :resume, NOW(), :picture, :is_published, :slug");

        // Faire test avec un array à la place de bindValue
        $req->bindValue(':title', $movie->getTitle());
        $req->bindValue(':resume', $movie->getResume());
        $req->bindValue(':picture', $movie->getPiture());
        $req->bindValue(':is_published', $movie->getIs_published());
        $req->bindValue(':slug', $movie->getSlug());
      
        $req->execute();
    }

    public function update(Movie $movie) {
        $req = $this->db->prepare("UPDATE movies SET title = :title, resume = :resume, picture = :picture, is_published = :is_published, slug = :slug WHERE id = :id");

        $req->bindValue(':title', $movie->getTitle());
        $req->bindValue(':resume', $movie->getResume());
        $req->bindValue(':picture', $movie->getPiture());
        $req->bindValue(':is_published', $movie->getIs_published());
        $req->bindValue(':slug', $movie->getSlug());
        $req->bindValue(':id', $movie->getId(), PDO::PARAM_INT); // avec PDO::PARAM_INT, on attend bien une valeur de type INT

        $req->execute();
    }

     // Requête préparée
     public function delete($id) {
        $this->db->exec("DELETE FROM movies WHERE id = " . (int)$id);
    }

    public function count() {
        return $this->db->query("SELECT COUNT(id) FROM movies")->fetchColumn();
    }

    public function getAllMovies() {
        $sql = "SELECT * FROM movies ORDER BY date_add DESC";
        $req = $this->db->query($sql);
        $datas = $req->fetchAll(\PDO::FETCH_CLASS, 'App\Entity\Movie');

        return $datas;
    }

    public function getNbMovies(int $nb) {
        $sql = "SELECT * FROM movies ORDER BY date_add DESC LIMIT 0, :nb_max";
        $req = $this->db->prepare($sql);        
        // $req->bindValue(':nb_min', 0, \PDO::PARAM_INT);
        $req->bindValue(':nb_max', $nb, \PDO::PARAM_INT);
        $req->execute();
        $datas = $req->fetchAll(\PDO::FETCH_CLASS, 'App\Entity\Movie');

        return $datas;
    }

    public function getOne($id) {
        $sql = "SELECT * FROM movies WHERE id = :id";
        $req = $this->db->prepare($sql);
        $req->bindValue(':id', (int)$id, \PDO::PARAM_INT);
        $req->execute();
        $movie = $req->fetchObject('App\Entity\Movie');

        return $movie;
    }
}