<?php
namespace App\Entity;
use DateTime;

class Movie {

    protected $id;
    protected $title;
    protected $resume;
    protected $date_add;
    protected $picture;
    protected $is_published;
    protected $slug;
    protected $trailer;


    // public function __construct($id, $title, $resume, $date_add, $picture, $is_published, $slug) {
    //     $this->id = $id;
    //     $this->title = $title;
    //     $this->resume = $resume;
    //     $this->date_add = $date_add;
    //     $this->picture = $picture;
    //     $this->is_published = $is_published;
    //     $this->slug = $slug;
    // }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getResume() {
        return $this->resume;
    }

    public function getDateAdd() {
        $date = new DateTime($this->date_add);
        return $date->format('d-m-Y H:i');
    }

    public function getPicture() {
        return $this->picture;
    }

    public function getIsPublished() {
        if ($this->is_published === 1) {
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

    public function getVideo() {
        echo '<iframe src="https://www.youtube.com/embed/' . $this->getTrailer() . '?controls=0&autoplay=1&mute=1&loop=1&playlist=' . $this->getTrailer() . 'frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="trailer"></iframe>';
    }
}