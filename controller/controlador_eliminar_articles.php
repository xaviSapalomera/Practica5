<?php

include './model/model_articles.php';


    if(isset($_POST['id'])){

        $id = $_POST['id'];


     borrarArticles($id);

        

    }

?>