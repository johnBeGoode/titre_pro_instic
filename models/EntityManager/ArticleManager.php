<?php 
namespace App\EntityManager ;
use App\Entity\Article;

class ArticleManager{
    private $bdd = "test bdd";

    public function getArticle(){
        return new Article();
    }
}

?>