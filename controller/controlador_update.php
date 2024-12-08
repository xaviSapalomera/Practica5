<?php

session_start();

include './model/model_articles.php';



if (isset($_POST['titol']) && isset($_POST['cos'])) {

    $titol = $_POST['titol'];
        
  $articlesPROVA = mostraTotsArticles();

  echo $articlesPROVA['titol'];

} else {
    $titol = '';
}

/*
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
        */
?>
