<?php
include './model/model_articles.php';

//verificar que han introduit un ID
if(isset($_POST['id'])){

    $id = $_POST['id'];

    if($id !== null){

        $id = $_POST['id'];

        borrarArticles($id);
    }
}
    
//mostrar tots els articles
function mostrarArticles(){

    
    $articles = mostrarTotsArticles();

    
    
         
    foreach ($articles as $article) {
        echo '<article style="border: 2px solid black; padding: 30px; border-radius: 30px;">';
        echo "<p> ID: " . htmlspecialchars($article['id']) . "</p>";
        echo "<p> TITOL: " . htmlspecialchars($article['titol']) . "</p>";
        echo "<p> COS: " . htmlspecialchars($article['cos']) . "</p>";

    
        echo '</article>';
    }
}
?>