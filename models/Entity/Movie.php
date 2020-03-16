<?php
namespace App\Entity;
use DateTime;

class Movie {

    protected $id;
    protected $title;
    protected $synopsis;
    protected $date_add;
    protected $picture;
    protected $is_published;
    protected $slug;
    protected $trailer;
    protected $mise_en_avant;


    // Getters
    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getSynopsis() {
        return $this->synopsis;
    }

    public function getDateAdd() {
        $date = new DateTime($this->date_add);
        return $date->format('d-m-Y H:i');
    }

    public function getPicture() {
        return $this->picture;
    }
    
    public function getIsPublished() {
        if ($this->is_published === '1') {
            return true;
        }
        return false;
    }

    public function getSlug() {
        return $this->slug;
    }

    public function getTrailer() {
        return $this->trailer;
    }

    public function getMiseEnAvant() {
        if ($this->mise_en_avant === '1') {
            return true;
        }
        return false;
    }

    // Mettre mute=1 pour lancer l'autoplay (paramètre autoplay=1)
    // Fct miniature trailer sur page principale
    public function getVideo() {
        echo '<iframe src="https://www.youtube.com/embed/' . $this->getTrailer() . '?controls=0&autoplay=1&mute=1&loop=1&playlist=' . $this->getTrailer() . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="trailer"></iframe>';
    }

    // Fct trailer sur la page du film en question
    public function getVideoArticle() {
        echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $this->getTrailer() . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    }
}