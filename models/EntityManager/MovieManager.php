<?php
namespace App\EntityManager;
use App\DBFactory;
use App\Entity\Movie;


class MovieManager {

    protected $db;


    public function __construct() {
        $this->db = DBFactory::getConnexion();
    }

    public function add($movieId, $title, $synopsis, $picture, $isPublished, $categorie, $slug, $trailer, $misEnAvant) {
        $slug = strtolower($title);
        $slug = str_replace(' ','_', $slug);
        $req = $this->db->prepare("INSERT INTO movies (title, synopsis, date_add, picture, is_published, slug, trailer, mis_en_avant) VALUES (:title, :synopsis, NOW(), :picture, :is_published, :slug, :trailer, :mis_en_avant)");

        $req->bindValue(':title', $title);
        $req->bindValue(':synopsis', $synopsis);
        $req->bindValue(':picture', $picture);
        $req->bindValue(':is_published', $isPublished);
        $req->bindValue(':slug', $slug);
        $req->bindValue(':trailer', $trailer);
        $req->bindValue(':mis_en_avant', $misEnAvant);
        $req->execute();

        $req = $this->db->prepare("INSERT INTO movies_categories VALUES (:movieId, :categorieId)");
        $req->bindValue(':movieId', $movieId);
        $req->bindValue(':categorieId', $categorie);
        $req->execute();
    }

    public function update($title, $synopsis, $id) {
        $req = $this->db->prepare("UPDATE movies SET title = :title, synopsis = :synopsis WHERE id = :id");

        $req->bindValue(':title', $title);
        $req->bindValue(':synopsis', $synopsis);
        $req->bindValue(':id', $id);
        // $req->bindValue(':picture', $movie->getPicture());
        // $req->bindValue(':is_published', $movie->getIsPublished());
        // $req->bindValue(':slug', $movie->getSlug());
        $req->execute();
    }

    // public function update(Movie $movie) {
    //     $req = $this->db->prepare("UPDATE movies SET title = :title, synopsis = :synopsis, picture = :picture, is_published = :is_published, slug = :slug WHERE id = :id");

    //     $req->bindValue(':title', $movie->getTitle());
    //     $req->bindValue(':synopsis', $movie->getSynopsis());
    //     $req->bindValue(':picture', $movie->getPicture());
    //     $req->bindValue(':is_published', $movie->getIsPublished());
    //     $req->bindValue(':slug', $movie->getSlug());
    //     $req->bindValue(':id', $movie->getId(), \PDO::PARAM_INT);

    //     $req->execute();
    // }

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

    public function getAllMoviesPublished() {
        $sql = "SELECT * FROM movies WHERE is_published = 1 ORDER BY date_add DESC";
        $req = $this->db->query($sql);
        $datas = $req->fetchAll(\PDO::FETCH_CLASS, 'App\Entity\Movie');

        return $datas;
    }

    public function getNbMovies(int $nb) {
        $sql = "SELECT * FROM movies WHERE is_published = 1 ORDER BY date_add DESC LIMIT 0, :nb_max";
        $req = $this->db->prepare($sql);        
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

    public function getMoviesByCategory($categoriesId) {
        $sql = "SELECT DISTINCT COUNT(movie_id) FROM movies_categories WHERE Categorie_id = :categoriesId";
        $req = $this->db->prepare($sql);
        $req->bindValue(':categoriesId', $categoriesId);
        $req->execute();
        $countByCategory = $req->fetchColumn();

        return $countByCategory; 
    }
}