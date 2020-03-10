<?php
namespace App\Entity;
use DateTime;

class User {

    protected $id;
    protected $avatar;
    protected $name;
    protected $password;
    protected $role;
    protected $email;
    protected $date_registration;

    
    // Getters
    public function getId() {
        return $this->id;
    }

    public function getAvatar() {
        return $this->avatar;
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

    public function getDateRegistration() {
        $date = new DateTime($this->date_registration);
        return $date->format('d-m-Y H:i');
    }
}