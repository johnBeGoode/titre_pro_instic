<?php
namespace App\EntityManager;
use App\DBFactory;

class CommentsManager {

    protected $db;


    public function __construct(PDO $db) {

        $this->db = $db;
    }

    public function add(Comments $comments ) {

        $req = $this->db->prepare("INSERT INTO news_commentaires (id_news, auteur, commentaire, date_commentaire) VALUES (:id_news, :auteur, :commentaire, NOW()");

        $req->bindValue(':id_news', $comments->getIdNews());
        $req->bindValue(':auteur', $comments->getAuteur());
        $req->bindValue(':commentaire', $comments->getCommentaire());

        $req->execute();
    }

    public function update(Comments $comments) {

        $req = $this->db->prepare("UPDATE comments SET auteur = :auteur, commentaire = :commentaire, date_commentaire = :date_commentaire WHERE id = :id");

        $req->bindValue(':auteur', $comments->getAuteur());
        $req->bindValue(':commentaire', $comments->getCommentaire());
        $req->bindValue(':id', $comments->getId(), PDO::PARAM_INT);

        $req->execute();
    }

    public function delete($id) {

        $this->db->exec("DELETE FROM news_commentaires WHERE id =" . (int)$id);
    }

    public function count() {
        
        return $this->db->query("SELECT COUNT(id) FROM news_commentaires")->fetchColumn();
    }

    public function getOne($id) {
        return $this->db->query("SELECT * FROM news_commentaires WHERE id=" . (int) $id);
    }
}