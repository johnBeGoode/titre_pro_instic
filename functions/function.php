<?php 

function addNotif($type, $text, $icon){
    $_SESSION['success'] = array("type"=>$type,"text"=>$text,"icon"=>$icon);
}
