<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREAR ARITCLES</title>
    <link rel="stylesheet" href="./estil/insert.css">
    <link rel="shortcut icon" href="./photos/icon_dtm.webp" />
</head>
<body>    

<form class="boto" action="update.php" method="post">
    <input type="submit" value="ACTUALIZAR">
</form>

<form class="boto" action="delete.php" method="post">
    <input type="submit" value="ELIMINAR">
</form>

<form class="boto" action="index_session.php" method="post">
    <input type="submit" value="HOME">
</form>

<hr style="width:100%;margin-left:0;margin-top: 0;"> 


<?php 

include './controller/controlador_insert.php';
    
?>

    <form class="form" action="insert.php" method="post">
    
    <input class="input" type="text" name="titol" placeholder="TITOL">
    
    <br>
    <br>
    
    
    <br>
    
    <input class="input" type="text" style="height: 250px; width: 400px; text-align: left; padding-top: 0px;" name="cos" placeholder="COS">

    <br>
    <br>
    <input style="margin-left: 150px; font-size:40px" type="submit" name="INSERTAR">
    </form>



</body>
</html>