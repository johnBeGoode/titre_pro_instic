<?php
namespace App\EntityManager;
use App\DBFactory;
use App\Entity\Movies;


class MoviesManager{

    // attribut contenant l'instance représentant la base de données
    protected $db;


    public function __construct() {

        $this->db = DBFactory::getMysqlConnexionWithPDO();
    }

    public function add(News $news) {

        $req = $this->db->prepare("INSERT INTO news (auteur, titre, contenu, date_ajout) VALUES (:auteur, :titre, :contenu, NOW()");

        // Faire test avec un array à la place de bindValue
        $req->bindValue(':auteur', $news->getAuteur());
        $req->bindValue(':titre', $news->getTitre());
        $req->bindValue(':contenu', $news->getContenu());

        $req->execute();
    }

    public function update(News $news) {
        
        $req = $this->db->prepare("UPDATE news SET auteur = :auteur, titre = :titre, contenu = :contenu WHERE id = :id");
        $req->bindValue(':auteur', $news->getAuteur());
        $req->bindValue(':titre', $news->getTitre());
        $req->bindValue(':contenu', $news->getContenu());
        $req->bindValue(':id', $news->getId(), PDO::PARAM_INT);

        $req->execute();
    }

     // Requête préparée
     public function delete($id) {

        $this->db->exec("DELETE FROM news WHERE id=" . (int)$id);
    }

    public function count() {

        return $this->db->query("SELECT COUNT(id) FROM news")->fetchColumn();
    }

    // public function getList($debut = -1, $limite = -1) {

    //     $sql = 'SELECT * FROM news ORDER BY id DESC';
    
    //     // On vérifie l'intégrité des paramètres fournis.
    //     if ($debut != -1 || $limite != -1) {
    //         $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    //     }
        
    //     $req = $this->db->query($sql);
    //     // $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'News');
    //     $req->setFetchMode(PDO::FETCH_CLASS, 'News');
        
    //     $listeNews = $req->fetchAll();

    //     // On parcourt notre liste de news pour pouvoir placer des instances de DateTime en guise de dates d'ajout et de modification.
    //     foreach ($listeNews as $news) {
    //         $news->setDate_ajout(new DateTime($news->getDate_ajout()));
    //         // $news->setDate_modif(new DateTime($news->getDate_modif()));
    //     }

    //     $req->closeCursor();

    //     return $listeNews;
    // }

    public function getAllMovies(){
        $sql = 'SELECT * FROM movies ORDER BY date_add DESC';
        $req = $this->db->query($sql);

        $datas = $req->fetchAll(\PDO::FETCH_CLASS, 'App\Entity\Movies');
        return $datas;
    }

    public function getOne($id) {

        $req = $this->db->prepare("SELECT * FROM news WHERE id = :id");
        $req->bindValue(':id', (int)$id, PDO::PARAM_INT);
        $req->execute();

        // $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'News');
        $req->setFetchMode(PDO::FETCH_CLASS, 'News');

        $news = $req->fetch();

        // ?????
        // $news->setDate_ajout(new DateTime($news->getDate_ajout()));
        // $news->setDate_modif(new DateTime($news->getDate_modif()));

        return $news;
    }
}