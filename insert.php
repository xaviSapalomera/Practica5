<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Articles</title>
    <link rel="shortcut icon" href="./photos/icon_dtm.webp" />
    <link rel="stylesheet" href="./estil/pop_up.css">
    <link rel="stylesheet" href="./estil/insert.css">
    <script defer src="./ts/js/articles_control.js"></script>
</head>
<body>
    <form class="boto" action="index_session.php" method="post">
        <input type="submit" value="Home">
    </form>
    <hr style="width: 100%; margin: 0;">

    <!-- Formulario para crear artículo -->
    <form id="articleForm" class="form" action="insert.php" method="post">
        <input id="titol" class="input" type="text" name="titol" placeholder="Titol" required>
        <div id="titolDIV" class="error"></div>
        <br><br>
        <textarea id="cos" class="input" name="cos" placeholder="Cos" style="height: 250px; width: 400px; text-align: left; padding: 10px;" required></textarea>
        <div id="cosDIV" class="error"></div>
        <br><br>
        <input id="BotoArticle" style="margin-left: 150px; font-size: 40px;" type="submit" value="Insertar">
    </form>
</body>
</html>
<?php

    include './controller/controlador_insert.php';

?>