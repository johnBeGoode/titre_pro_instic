<?php
namespace App\Entity;
use DateTime;

class User {

    protected $id;
    protected $avatar;
    protected $nom;
    protected $pass;
    protected $rol;
    protected $email;
    protected $date_registration;


    public function getId() {
        return $this->id;
    }

    public function getAvatar() {
        return $this->avatar;
    }

    public function getName() {
        return $this->nom;
    }

    public function getPassword() {
        return $this->pass;
    }

    public function getRole() {
        return $this->rol;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getDateRegistration() {
        $date = new DateTime($this->date_registration);
        return $date->format('d-m-Y H:i');
    }
}