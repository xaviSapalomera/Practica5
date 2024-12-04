<?php


include './model/model_articles.php';




//mostrar els articles
function mostrarArticles(){

     $articles = mostrarTotsArticles();

    
echo '<link rel="stylesheet" href="estil.css">';
     
foreach ($articles as $article) {
    echo '<article style="border: 2px solid black; padding: 30px; border-radius: 30px;">';
    echo "<p>" . htmlspecialchars($article['titol']) . "</p>";
    echo "<p>" . htmlspecialchars($article['cos']) . "</p>";
    


    echo '</article>';
}
}

?>
