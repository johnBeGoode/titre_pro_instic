<?php
namespace App\Entity;

class Category {

    protected $id;
    protected $name;

    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }
}