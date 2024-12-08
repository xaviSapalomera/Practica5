<?php

session_start();



include './model/model_articles.php';

$order = isset($_POST['order']) ? $_POST['order'] : 'normal';

switch ($order) {
    case 'ascID':
        $articles = mostrarArticlesOrdenatsIDasc();
        break;
    case 'descID':
        $articles = mostrarArticlesOrdenatsIDdesc();
        break;
    case 'ascNom':
        $articles = mostrarArticlesOrdenatsTitolAsc();
        break;
    case 'descNom':
        $articles = mostrarArticlesOrdenatsTitolDesc();
        break;
    default:
        $articles = mostrarTotsArticles();
}

if(isset($_POST['Logout'])){
    session_destroy();
    header('location: index.php');
    exit();
}

$paginaActual = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$totalArticulos = count($articles);
$articulosPorPagina = 10;

$totalPagines = ($totalArticulos > 0) ? ceil($totalArticulos / $articulosPorPagina) : 0;

$offset = ($paginaActual - 1) * $articulosPorPagina;
$articles = array_slice($articles, $offset, $articulosPorPagina);
?>

<div class="contenidor">
    <h1>Articles</h1>

    <form method="POST" action="index_session.php">
    <label for="order">Filtre:</label>
    <select name="order">
        <option value="normal">Normal</option>
        <option value="ascID">Asc(ID)</option>
        <option value="descID">Desc(ID)</option>
        <option value="ascNom">Asc(Nom)</option>
        <option value="descNom">Desc(Nom)</option>
    </select>
    <button type="submit">Ordenar</button>
</form>

<section class="articles">
    <?php if (!empty($articles)) { ?>
        <div class="articles-blocks">
            <?php foreach ($articles as $article) { ?>
                <div class="article-block">
                    <div class="article-header">
                        <h2><?= isset($article['id']) ? $article['id'] : 'Sense ID' ?></h2>
                        <h3><?= isset($article['titol']) ? htmlspecialchars($article['titol']) : 'Sense Titol' ?></h3>
                    </div>
                    <div class="article-content">
                        <p><?= isset($article['cos']) ? htmlspecialchars($article['cos']) : 'Sense Cos' ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } else { ?>
        <p>No hi ha articles disponibles en aquesta pàgina.</p>
    <?php } ?>
</section>


    <!-- Secció per a la paginació -->
    <section class="paginacio">
        <ul>
            <?php if ($paginaActual > 1) { ?>
                <li><a href="?page=<?= $paginaActual - 1 ?>">&laquo; Anterior</a></li>
            <?php } else { ?>
                <li class="disabled"><a href="#">&laquo; Anterior</a></li>
            <?php } ?>

            <?php for ($i = 1; $i <= $totalPagines; $i++) { ?>
                <?php if ($paginaActual == $i) { ?>
                    <li class="active"><a href="#"><?= $i ?></a></li>
                <?php } else { ?>
                    <li><a href="?page=<?= $i ?>"><?= $i ?></a></li>
                <?php } ?>
            <?php } ?>

            <?php if ($paginaActual < $totalPagines) { ?>
                <li><a href="?page=<?= $paginaActual + 1 ?>">Següent &raquo;</a></li>
            <?php } else { ?>
                <li class="disabled"><a href="#">Següent &raquo;</a></li>
            <?php } ?>
        </ul>
    </section>
</div>