<?php
class News {
    
    // attributs
    protected $erreurs = [];
    protected $id;
    protected $auteur;
    protected $titre;
    protected $contenu;
    protected $date_ajout;
    // protected $date_modif;

    // constantes (relatives aux erreurs possibles rencontrées lors de l'exécution de la méthode)
    const AUTEUR_INVALIDE = 1;
    const TITRE_INVALIDE = 2;
    const CONTENU_INVALIDE = 3;

    // méthodes
    public function __construct($data = []) {

        if(!empty($data)) { // si on a spécifié des valeurs alors on hydrate l'objet
            $this->hydrate($data);
        }
    }

    public function hydrate(Array $data):void {

        foreach ($data as $key => $val) {
            $methode = 'set' . ucfirst($key);
            if (method_exists($this, $methode)) {
                $this->$methode($val);
            }
        }
    }

    // voir si la news est nouvelle
    public function isNew():bool {

        return empty($this->id);
    }

    // voir si la news est valide
    public function isValid():bool {

        return !(empty($this->auteur) || empty($this->titre) || empty($this->contenu));
    }


    // getters
    public function erreurs() {
        return $this->erreurs;
    }

    public function getId() {
        return $this->id;
    }

    public function getAuteur() {
        return $this->auteur;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function getContenu() {
        return $this->contenu;
    }

    public function getDate_ajout() {
        return $this->date_ajout;
    }

    // public function getDate_modif() {
    //     return $this->date_modif;
    // }

    // setters
    public function setId($id) {

        $this->id = (int)$id;
    }

    public function setAuteur($auteur) {
        if (!is_string($auteur) || empty($auteur)) {
            $this->$erreurs[] = self::AUTEUR_INVALIDE; // si on ne précise pas d'index les valeurs se mettent à la suite dans le tableau d'erreurs
        }
        else {
            $this->auteur = $auteur;
        }
    }

    public function setTitre($titre) {
        if (!is_string($titre) || empty($titre)) {
            $this->$erreurs[] = self::TITRE_INVALIDE;
        }
        else {
            $this->titre = $titre;
        }
    }

    public function setContenu($contenu) {
        if (!is_string($contenu) || empty($contenu)) {
            $this->$erreurs[] = self::CONTENU_INVALIDE;
        }
        else {
            $this->contenu = $contenu;
        }
    }

    public function setDate_ajout($date_ajout) {
        $this->date_ajout = $date_ajout;
    }

    // public function setDate_modif($date_modif) {
    //     $this->date_modif = $date_modif;
    // }
}