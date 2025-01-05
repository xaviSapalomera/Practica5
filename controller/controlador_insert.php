<?php 

session_start();
include './model/model_articles.php';
include './model/model_usuaris.php';
include './controlador_perfil.php';
//Controla la introduixo del titol i el cos
    if (isset($_POST["titol"]) && isset($_POST['cos'])) {

        $post_Titol = $_POST['titol'];

        $post_Cos = $_POST['cos'];

        $data = date("Y-m-d");

        $correu = $_SESSION['correu'];

        $resultats = perfilDades($correu);

        foreach($resultats as $resultat){
            $id_usuari = $resultat['id'];
        }

       $comprovacio = introduirArticles($post_Titol, $post_Cos,$data,$id_usuari);

        if ($comprovacio) {
            echo 'Se han introduit les dades correctement';
        }else{
            echo 'Error al introduir les dades';
        }

    }

?>