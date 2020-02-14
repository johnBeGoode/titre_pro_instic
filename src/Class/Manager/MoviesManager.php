<?php
require_once 'src/class/Movies.php';

class MoviesManager {

    // attribut contenant l'instance représentant la base de données
    protected $db;


    public function __construct(PDO $db) {

        $this->db = $db;
    }

    public function add(News $news) {

        $req = $this->db->prepare("INSERT INTO Movies (auteur, titre, contenu, date_ajout) VALUES (:auteur, :titre, :contenu, NOW()");

        // Faire test avec un array à la place de bindValue
        $req->bindValue(':auteur', $news->getAuteur());
        $req->bindValue(':titre', $news->getTitre());
        $req->bindValue(':contenu', $news->getContenu());

        $req->execute();
    }

    public function update(News $news) {
        
        $req = $this->db->prepare("UPDATE movies SET auteur = :auteur, titre = :titre, contenu = :contenu WHERE id = :id");
        $req->bindValue(':auteur', $news->getAuteur());
        $req->bindValue(':titre', $news->getTitre());
        $req->bindValue(':contenu', $news->getContenu());
        $req->bindValue(':id', $news->getId(), PDO::PARAM_INT);

        $req->execute();
    }

     // Requête préparée
     public function delete($id) {

        $this->db->exec("DELETE FROM movies WHERE id=" . (int)$id);
    }

    public function count() {

        return $this->db->query("SELECT COUNT(id) FROM movies")->fetchColumn();
    }

    public function getAllMovies(){
        $sql = 'SELECT * FROM movies ORDER BY date_add DESC';
        $req = $this->db->query($sql);

        $datas = $req->fetchAll(PDO::FETCH_CLASS, "Movies");
        return $datas;
    }

    public function getOne($id) {

        $req = $this->db->prepare("SELECT * FROM movies WHERE id = :id");
        $req->bindValue(':id', (int)$id, PDO::PARAM_INT);
        $req->execute();

        // $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'News');
        $req->setFetchMode(PDO::FETCH_CLASS, 'Movies');

        $news = $req->fetch();

        // ?????
        // $news->setDate_ajout(new DateTime($news->getDate_ajout()));
        // $news->setDate_modif(new DateTime($news->getDate_modif()));

        return $news;
    }
}