<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Articles</title>
    <link rel="stylesheet" href="./estil/delete.css">
    <link rel="shortcut icon" href="icon_dtm.webp" />
</head>
<body>

<input type="button" class="icon_perfil">

<form  action="insert.php" method="post">
    <input type="submit" value="INSERTAR">
</form>

<form action="update.php" method="post">
    <input type="submit" value="ACTUALIZAR">
</form>


<form action="index_session.php" method="post">
    <input type="submit" value="HOME">
</form>

  
    <form class="form" action="delete.php" method="post">
        
        <input class="input" type="number" name="id" placeholder="ID">
        <br>
        <br>
        <input style="margin-left: 150px; font-size:40px" type="submit" value="BORRAR">
    </form>

 <br>
 <br>
 
<div style="margin-bottom: 250px"></div>
<?php 


include './controller/controlador_index.php';
?>

</body>
</html>