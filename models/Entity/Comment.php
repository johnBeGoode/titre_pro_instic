<?php
namespace App\Entity;

class Comment {
    
    protected $id;
    protected $comment;
    protected $date_add;
    protected $movie_id;
    protected $user_id;


    // public function __construct($id, $comment, $date_add, $movie_id, $user_id) {
    //     $this->id = $id;
    //     $this->comment = $comment;
    //     $this->date_add = $date_add;
    //     $this->movie_id = $movie_id;
    //     $this->user_id = $user_id;
    // }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getComment() {
        return $this->comment;
    }

    public function getDateAdd() {
        return $this->date_add;
    }

    public function getMovieId() {
        return $this->movie_id;
    }

    public function getUserId() {
        return $this->user_id;
    }

    // Setters ??
}