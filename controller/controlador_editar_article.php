<?php

if(isset($_POST['titol']) && isset($_POST['cos']) && isset($_POST['id'])){

    $titol = $_POST['titol'];
    $cos = $_POST['cos'];
    $id = $_POST['id'];

    actualitzarArticle($titol,$cos,$id);

}else{

}

include './model/model_articles.php';
?>