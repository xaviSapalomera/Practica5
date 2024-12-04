<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACTUALITZAR ARTICLES</title>
    <link rel="stylesheet" href="./estil/update.css">
    <link rel="shortcut icon" href="./photos/icon_dtm.webp" />
</head>
<body>
<header>

<input type="button" class="icon_perfil">

<form class="boto" action="insert.php" method="post">
    <input type="submit" value="INSERTAR">
</form>

<form class="boto" action="update.php" method="post">
    <input type="submit" value="ACTUALIZAR">
</form>

<form class="boto" action="delete.php" method="post">
    <input type="submit" value="ELIMINAR">
</form>

<form class="boto" action="index_session.php" method="post">
    <input type="submit" value="HOME">
</form>



</header>
    
<form class="form" action="update.php" method="post">
        <br>
        <br>
        <input class="input" type="number" name="id" placeholder="ID">
        <br>
        <br>
        <input class="input" type="text" name="titol" placeholder="TITOL">
        <br>
        <br>
        <input class="input" type="text" name="cos" placeholder="COS">
        <br>
        <br>    
        <input style="margin-right: 110px; font-size:40px" type="submit" value="ACTUALITZAR">
    </form>

    <br>

    <br>

    
<?php

    include './controller/controlador_index.php';

    mostrarArticles();


?>



</body>
</html>