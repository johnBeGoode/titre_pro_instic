<?php
namespace App\EntityManager;
use App\DBFactory;
use App\Entity\Comment;


class CommentManager {

    protected $db;


    public function __construct() {
        $this->db = DBFactory::getConnexion();
    }

    public function add(Comment $comment) {
        $req = $this->db->prepare("INSERT INTO comments (comment, date_add, movie_id, user_id) VALUES (:comment, NOW(), :movie_id, :user_id");

        $req->bindValue(':comment', $comment->getComment());
        $req->bindValue(':movie_id', $comment->getMovieId());
        $req->bindValue(':user_id', $comment->getUserId());

        $req->execute();
    }

    public function update(Comment $comment) {
        $req = $this->db->prepare("UPDATE comments SET comment = :comment, WHERE id = :id");

        $req->bindValue(':comment', $comment->getComment());
        $req->bindValue(':id', $comment->getId(), \PDO::PARAM_INT);

        $req->execute();
    }

    public function delete($id) {
        $this->db->exec("DELETE FROM comments WHERE id =" . (int)$id);
    }

    public function count() {
        return $this->db->query("SELECT COUNT(id) FROM comments")->fetchColumn();
    }

    public function getAllComments($movieId) {
        $sql = "SELECT * FROM comments WHERE movie_id= :movieId ORDER BY date_add DESC";
        $req = $this->db->prepare($sql);
        $req->bindValue(':movieId', $movieId, \PDO::PARAM_INT);
        $req->execute();
        $datas = $req->fetchAll(\PDO::FETCH_CLASS, 'App\Entity\Comment');

        return $datas;
    }

    // public function getOne($id) {
    //     return $this->db->query("SELECT * FROM comments WHERE id=" . (int)$id);
    // }

    public function getUserName(int $userId) {

        // $sql = "SELECT users.name FROM users INNER JOIN comments ON users.id = comments.user_id WHERE users.id = :userId";
        // $req = $this->db->prepare($sql);
        // $req->bindValue(':userId', $userId, \PDO::PARAM_INT);
        // $req->execute();
        // $data = $req->fetch();

        // return $data;
    }
}