<?php

if (!empty($_GET['id'])) {
    $id = (int) $_GET['id'];

    $bdd = new PDO("mysql:host=localhost;dbname=appjohn", "root", "");

    $req = $bdd->prepare("SELECT * FROM comments WHERE id > :id ORDER BY id DESC");
    $req->execute(array(
        "id" => $id
    ));

    while ($data = $req->fetch()) {
        echo  '<div class="commentaire" id="' . $data["id"] . '">
                

        <div class="commentaire-content">' .
            $data['date_add'] . ', ' .  $data['user_id'] .
            '<p>' . $data['comment'] . '</p>
                </div>
            </div>';
    }
}
