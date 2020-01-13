<?php
require('NewsManager.php');

class NewsManagerPDO extends NewsManager {

    // attribut contenant l'instance représentant la base de données
    protected $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    protected function add(News $news) {
        $req = $this->db->prepare("INSERT INTO news (auteur, titre, contenu, date_ajout, date_contenu) VALUES (:auteur, :titre, :contenu, NOW(), NOW()");

        // on peut enlever les : devant auteur, titre et contenu, à test !!
        $req->bindValue(':auteur', $news->getAuteur());
        $req->bindValue(':titre', $news->getTitre());
        $req->bindValue(':contenu', $news->getContenu());

        $req->execute();
    }

    public function count() {
        return $this->db->query("SELECT COUNT(*) FROM news")->fetchColumn();
    }

    public function delete($id) {
        $this->db->exec("DELETE FROM news WHERE id=" . (int)$id);
    }

    public function getList($debut = -1, $limite = -1) {

        $sql = 'SELECT * FROM news ORDER BY id DESC';
    
        // On vérifie l'intégrité des paramètres fournis.
        if ($debut != -1 || $limite != -1) {
            $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
        }
        
        $requete = $this->db->query($sql);
        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'News');
        
        $listeNews = $requete->fetchAll();

        // On parcourt notre liste de news pour pouvoir placer des instances de DateTime en guise de dates d'ajout et de modification.
        foreach ($listeNews as $news) {
            $news->setDate_ajout(new DateTime($news->getDate_ajout()));
            // $news->setDate_modif(new DateTime($news->getDate_modif()));
        }
        
        $requete->closeCursor();
        
        return $listeNews;
    }

    public function getUnique($id) {
        $req = $this->db->prepare("SELECT * FROM news WHERE id = :id");
        $req->bindValue(':id', (int)$id, PDO::PARAM_INT);
        $req->execute();

        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'News');

        $news = $req->fetch();

        $news->setDate_ajout(new DateTime($news->getDate_ajout()));
        // $news->setDate_modif(new DateTime($news->getDate_modif()));

        return $news;
    }

    public function update(News $news) {
        $req = $this->db->prepare("UPDATE news SET auteur = :auteur, titre = :titre, contenu = :contenu, date_modif = NOW() WHERE id = :id");
        $req->bindValue(':auteur', $news->getAuteur());
        $req->bindValue(':titre', $news->getTitre());
        $req->bindValue(':contenu', $news->getContenu());
        $req->bindValue(':id', $news->getId(), PDO::PARAM_INT);

        $req->execute();
    }


}