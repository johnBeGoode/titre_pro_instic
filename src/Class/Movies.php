<?php
class Movies {
    
    protected $id;
    protected $title;
    protected $resume;
    protected $date_add;
    protected $picture;
    protected $is_published;
    protected $slug;



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

    public function getDate_add() {
        return $this->date_add;
    }

    public function getPicture() {
        return $this->picture;
    }

    public function getIs_published() {
        if ($this->is_published === 1) {
            return true;
        }
        return false;
    }

    public function getSlug() {
        return $this->slug;
    }
}