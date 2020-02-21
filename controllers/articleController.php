<?php 
use App\EntityManager\ArticleManager;

$articleManager = new ArticleManager();
$article = $articleManager->getArticle();
var_dump($article);

echo "id = ".$vars["id"]."<br>";
echo "slug = ".$vars["slug"];
  
require_once("../views/".$vue.".php");