<?php

namespace App\EntityManager;

use App\DBFactory;
use App\Entity\Comment;


class CommentManager
{

    protected $db;


    public function __construct()
    {
        $this->db = DBFactory::getConnexion();
    }

    public function add($comment, $movieId, $userId)
    {
        $sql = "INSERT INTO comments (comment, date_add, movie_id, user_id) VALUES (:comment, NOW(), :movie_id, :user_id)";
        $req = $this->db->prepare($sql);
        $req->bindValue(':comment', $comment);
        $req->bindValue(':movie_id', $movieId);
        $req->bindValue(':user_id', $userId);
        $req->execute();
    }

    public function update($comment, $id)
    {
        $sql = "UPDATE comments SET comment = :comment WHERE id = :id";
        $req = $this->db->prepare($sql);
        $req->bindValue(':comment', $comment);
        $req->bindValue(':id', $id);
        $req->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM comments WHERE id =" . (int)$id;
        $this->db->exec($sql);
    }

    public function count()
    {
        $sql = "SELECT COUNT(id) FROM comments";

        return $this->db->query($sql)->fetchColumn();
    }

    public function getAllCommentsForMovie($movieId)
    {
        $sql = "SELECT * FROM comments WHERE movie_id= :movieId ORDER BY date_add DESC";
        $req = $this->db->prepare($sql);
        $req->bindValue(':movieId', $movieId, \PDO::PARAM_INT);
        $req->execute();

        return $req->fetchAll(\PDO::FETCH_CLASS, 'App\Entity\Comment');
    }

    public function getAllComments()
    {
        $sql = "SELECT * FROM comments ORDER BY date_add DESC";
        $req = $this->db->query($sql);

        return $req->fetchAll(\PDO::FETCH_CLASS, 'App\Entity\Comment');
    }

    public function getOne($id)
    {
        $sql = "SELECT * FROM comments WHERE id = :id";
        $req = $this->db->prepare($sql);
        $req->bindValue(':id', $id, \PDO::PARAM_INT);
        $req->execute();

        return $req->fetchObject('App\Entity\Comment');
    }
}
