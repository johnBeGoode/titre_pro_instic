<?php
namespace App\Entity;

class Category {

    protected $id;
    protected $name;

    
    // Getters
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getMoviesByCategory() {
        
    }
}