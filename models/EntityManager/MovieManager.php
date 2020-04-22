<?php
namespace App\EntityManager;
use App\DBFactory;
use App\Entity\Movie;


class MovieManager {

    protected $db;


    public function __construct() {
        $this->db = DBFactory::getConnexion();
    }

    public function add($title, $synopsis, $picture, $isPublished, $categories, $trailer, $misEnAvant) {
        $slug = strtolower($title);
        $slug = str_replace(' ','_', $slug);

        $sql = "INSERT INTO movies (title, synopsis, date_add, picture, is_published, slug, trailer, mis_en_avant) VALUES (:title, :synopsis, NOW(), :picture, :is_published, :slug, :trailer, :mis_en_avant)";
        $req = $this->db->prepare($sql);

        $req->bindValue(':title', $title);
        $req->bindValue(':synopsis', $synopsis);
        $req->bindValue(':picture', $picture);
        $req->bindValue(':is_published', $isPublished);
        $req->bindValue(':slug', $slug);
        $req->bindValue(':trailer', $trailer);
        $req->bindValue(':mis_en_avant', $misEnAvant);
        $req->execute();

        $movieId = $this->db->lastInsertId();

        foreach ($categories as $category) {
            $req = $this->db->prepare("INSERT INTO movies_categories VALUES (:movieId, :categorieId)");
            $req->bindValue(':movieId', $movieId);
            $req->bindValue(':categorieId', $category);
            $req->execute();
        }
    }

    public function update($title, $synopsis, $picture, $categories, $trailer, $isPublished, $misEnAvant, $id) {
        $slug = strtolower($title);
        $slug = str_replace(' ','_', $slug);
        
        $sql = "UPDATE movies SET title = :title, synopsis = :synopsis, picture = :picture, trailer = :trailer, is_published = :is_published, slug = :slug, mis_en_avant = :mis_en_avant WHERE id = :id";
        $req = $this->db->prepare($sql);

        $req->bindValue(':title', $title);
        $req->bindValue(':synopsis', $synopsis);
        $req->bindValue(':picture', $picture);
        $req->bindValue(':trailer', $trailer);
        $req->bindValue(':is_published', $isPublished);
        $req->bindValue(':slug', $slug);
        $req->bindValue(':mis_en_avant', $misEnAvant);
        $req->bindValue(':id', $id);
        $req->execute();

        // tout vider de la table movie_categories qui concerne le films en question
        $req = $this->db->prepare("DELETE FROM movies_categories WHERE Movie_id=:movie_id");
        $req->bindValue(':movie_id', $id);
        $req->execute();
        // Et on les remet
        foreach ($categories as $category) {
            $req = $this->db->prepare("INSERT INTO movies_categories VALUES (:movieId, :categorieId)");
            $req->bindValue(':movieId', $id);
            $req->bindValue(':categorieId', $category);
            $req->execute();
        }
    }

    public function delete($id) {
        $sql = "DELETE FROM movies WHERE id = " . (int)$id;
        $this->db->exec($sql);
    }

    public function count() {
        $sql = "SELECT COUNT(id) FROM movies";
        
        return $this->db->query($sql)->fetchColumn();
    }

    public function getAllMovies() {
        $sql = "SELECT * FROM movies ORDER BY date_add DESC";
        $req = $this->db->query($sql);

        return $req->fetchAll(\PDO::FETCH_CLASS, 'App\Entity\Movie');
    }

    public function getAllMoviesPublished() {
        $sql = "SELECT * FROM movies WHERE is_published = 1 ORDER BY date_add DESC";
        $req = $this->db->query($sql);

        return $req->fetchAll(\PDO::FETCH_CLASS, 'App\Entity\Movie');
    }

    public function getNbMovies(int $nb) {
        $sql = "SELECT * FROM movies WHERE is_published = 1 ORDER BY date_add DESC LIMIT 0, :nb_max";
        $req = $this->db->prepare($sql);        
        $req->bindValue(':nb_max', $nb, \PDO::PARAM_INT);
        $req->execute();

        return $req->fetchAll(\PDO::FETCH_CLASS, 'App\Entity\Movie');
    }

    public function getMoviesMisenAvant() {
        $sql = "SELECT * FROM movies WHERE mis_en_avant = 1 ORDER BY date_add DESC";
        $req = $this->db->query($sql);

        return $req->fetchAll(\PDO::FETCH_CLASS, 'App\Entity\Movie');
    }

    public function getOne($id) {
        $sql = "SELECT * FROM movies WHERE id = :id";
        $req = $this->db->prepare($sql);
        $req->bindValue(':id', $id, \PDO::PARAM_INT);
        $req->execute();

        return $req->fetchObject('App\Entity\Movie');
    }

    public function getNumberOfMoviesByCategory($categoriesId) {
        $sql = "SELECT DISTINCT COUNT(movie_id) FROM movies_categories INNER JOIN movies ON movies.id = movies_categories.Movie_id WHERE Categorie_id = :categoriesId AND (is_published = 1 OR mis_en_avant = 1) ";
        $req = $this->db->prepare($sql);
        $req->bindValue(':categoriesId', $categoriesId);
        $req->execute();

        return $req->fetchColumn();
    }

    public function getMoviesByCategory($idCategory) {
        $sql =  "SELECT * FROM movies INNER JOIN movies_categories ON movies.id = movies_categories.Movie_id WHERE (is_published = 1 OR mis_en_avant = 1) AND movies_categories.Categorie_id = :idCategory";
        $req = $this->db->prepare($sql);
        $req->bindValue(':idCategory', $idCategory);
        $req->execute();

        return $req->fetchAll(\PDO::FETCH_CLASS, 'App\Entity\Movie');
    }

    public function getCategoriesForAMovie($idMovie) {
        $sql = "SELECT categorie_id FROM movies_categories WHERE Movie_id = :movieId";
        $req = $this->db->prepare($sql);
        $req->bindValue(':movieId', (int)$idMovie);
        $req->execute();

        return $req->fetchAll(\PDO::FETCH_COLUMN, 0);
    }

    public function getNbCommentsForaMovie($idMovie) {
        $sql = "SELECT COUNT(id) FROM comments WHERE movie_id = :movieId";
        $req = $this->db->prepare($sql);
        $req->bindValue(':movieId', (int)$idMovie);
        $req->execute();
        
        return $req->fetchColumn();
    }
}
