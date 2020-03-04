<?php
namespace App\Entity;

class User {

    protected $id;
    protected $name;
    protected $password;
    protected $role;
    protected $email;
    protected $date_registration;

    
    // Getters
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getRole() {
        return $this->role;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getDate_registration() {
        return $this->date_registration;
    }
}