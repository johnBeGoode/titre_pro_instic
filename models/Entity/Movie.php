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

    // mettre mute=1 pour lancer l'autoplay (paramètre autoplay=1)
    public function getVideo() {
        echo '<iframe src="https://www.youtube.com/embed/' . $this->getTrailer() . '?controls=0&autoplay=1&mute=1&loop=1&playlist=' . $this->getTrailer() . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="trailer"></iframe>';
    }

    public function getVideoArticle() {
        echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $this->getTrailer() . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    }
}