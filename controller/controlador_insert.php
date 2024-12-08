<?php 

session_start();
include './model/model_articles.php';

//Controla la introduixo del titol i el cos
    if (isset($_POST["titol"]) && isset($_POST['cos'])) {

        $post_Titol = $_POST['titol'];

        $post_Cos = $_POST['cos'];

       $comprovacio = introduirArticles($post_Titol, $post_Cos);

        if ($comprovacio) {
            echo 'Se han introduit les dades correctement';
        }else{
            echo 'Error al introduir les dades';
        }

    }

?>