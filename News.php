<?php
class News {
    
    protected $id;
    protected $auteur;
    protected $titre;
    protected $contenu;
    protected $date_ajout;
    protected $erreurs = [];

    // Constantes (relatives aux erreurs possibles rencontrées lors de l'exécution de la méthode)
    const AUTEUR_INVALIDE = 1;
    const TITRE_INVALIDE = 2;
    const CONTENU_INVALIDE = 3;



    public function __construct($data = []) { // voir si on peut mettre Array $data ici

        if(!empty($data)) { // si on a spécifié des valeurs alors on hydrate l'objet
            $this->hydrate($data);
        }
    }

    public function hydrate(Array $data):void { // un tableau doit être passé en paramètre d'où le "Array")

        foreach ($data as $key => $val) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) { // ici $this fait référence à la classe. On vérifie que la méthode existe dans la classe
                $this->$method($val); // si c'est le cas alors on appelle le setter
            }
        }
    }

    // Voir si la news est nouvelle
    public function isNew():bool {

        return empty($this->id);
    }

    // Voir si la news est valide
    public function isValid():bool {

        // return !(empty($this->auteur) || empty($this->titre) || empty($this->contenu));
        return (!empty($this->auteur) && !empty($this->titre) && !empty($this->contenu));
    }


    // Getters
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

    public function erreurs() {
        return $this->erreurs;
    }


    // Setters
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
}