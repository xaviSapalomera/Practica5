<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Articles</title>
    <link rel="stylesheet" href="./estil/insert.css">
    <link rel="shortcut icon" href="./photos/icon_dtm.webp" type="image/webp">
</head>
<body>    

    
    <form class="boto" action="index_session.php" method="post">
        <input type="submit" value="Home">
    </form>

    
    <hr style="width: 100%; margin: 0;"> 

    <?php 
        
        include './controller/controlador_insert.php';
    ?>

    <form class="form" action="insert.php" method="post">

    <input class="input" type="text" name="titol" placeholder="Titol" required>
        <br><br>

        <textarea class="input" name="cos" placeholder="Cos" style="height: 250px; width: 400px; text-align: left; padding: 10px;" required></textarea>
        <br><br>


        <input style="margin-left: 150px; font-size: 40px;" type="submit" value="Insertar">
    </form>

</body>
</html>