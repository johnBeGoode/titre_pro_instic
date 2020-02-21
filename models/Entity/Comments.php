<?php
namespace App\Entity;

class Comments {
    
    protected $id;
    protected $idNews;
    protected $auteur;
    protected $commentaire;
    protected $dateCommentaire;
    protected $erreurs = [];

    // Constantes (relative aux différentes erreurs rencontrées)
    const AUTEUR_INVALIDE = 1;
    const COMMENTAIRE_INVALIDE = 2;



    public function __construct($data = []) {
        if (!empty($data)) {
            $this->hydrate($data);
        }
    }

    public function hydrate(Array $data) {
        
        foreach ($data as $key => $val) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method))  {
                $this->$method($val);
            }
        }
    }

    public function isNew():bool {
        return empty($this->id);
    }

    public function isValid():bool {
        return (!empty($this->auteur) && !empty($this->commentaire));
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getIdNews() {
        return $this->idNews;
    }

    public function getAuteur() {
        return $this->auteur;
    }

    public function getCommentaire() {
        return $this->commentaire;
    }

    public function getDateCommentaire() {
        return $this->dateCommentaire;
    }

    public function getErreurs() {
        return $this->erreurs;
    }


    //Setters
    public function setId($id) {
        $this->id = (int) $id;
    }

    public function setIdNews($idNews) {
            $this->idNews = (int) $idNews;
    }

    public function setAuteur($auteur) {
        if (!is_string($auteur) || empty($auteur)) {
            $this->erreur[] = self::AUTEUR_INVALIDE;
        }
        else {
            $this->auteur = $auteur;
        }
    }

    public function setCommentaire($commentaire) {
        if (!is_string($commentaire) || empty($commentaire)) {
            $this->erreur[] = self::COMMENTAIRE_INVALIDE;
        }
        else {
            $this->commentaire = $commentaire;
        }
    }

    public function setDateCommentaire($dateCommentaire) {
        $this->dateCommentaire = $dateCommentaire;
    }

}