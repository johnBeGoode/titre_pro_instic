<?php
namespace App\Entity;

class Movies {

    protected $id;
    protected $title;
    protected $resume;
    protected $date_add;
    protected $picture;
    protected $is_published;
    protected $slug;


    public function __construct($id, $title, $resume, $date_add, $picture, $is_published, $slug) {
        $this->id = $id;
        $this->title = $title;
        $this->resume = $resume;
        $this->date_add = $date_add;
        $this->picture = $picture;
        $this->is_published = $is_published;
        $this->slug = $slug;
    }

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
        return $this->date_add;
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

    // Setters ??
}