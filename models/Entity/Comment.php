<?php
namespace App\Entity;
use App\EntityManager\UserManager;
use App\EntityManager\MovieManager;
use DateTime;

class Comment {
    
    protected $id;
    protected $comment;
    protected $date_add;
    protected $movie_id;
    protected $user_id;

    
    public function getId() {
        return $this->id;
    }

    public function getComment() {
        return $this->comment;
    }

    public function getDateAdd() {
        $date = new DateTime($this->date_add);
        return $date->format('d-m-Y H:i');
    }

    public function getMovieId() {
        return $this->movie_id;
    }

    public function getMovie() {
        $movieManager = new MovieManager();
        return $movieManager->getOne($this->movie_id );
    }

    public function getUserId() {        
        return $this->user_id;
    }

    public function getUser() {
        $userManager = new UserManager();
        return $userManager->getUser($this->user_id);
    }
}