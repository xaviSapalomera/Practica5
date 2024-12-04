<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="./estil/profile.css">
    <link rel="shortcut icon" href="./photos/icon_dtm.webp" />
</head>
<body>
<div class="header">
<form method="post">
    <button type="submit" class="icon_logout" name="Logout"></button>
</form>

<form method="post" action="perfil_usuari.php">
    <button type="submit" class="icon_perfil" name="Logout"></button>
</form>
<form action="index_session.php" method="post">
    <input class="boto_header" type="submit" value="HOME">
</form>
</div>
    <div class="photo_profile"></div>

<form action="perfil_usuari.php" method="post">

    <input class="input" type="text" name="nomUsuari" placeholder="NOM">
    <br>
    <br>
    <input type="submit" value="CAMBIAR NOM">

</form>
<br>

<form class="form" action="perfil_usuari.php" method="post">

<input name="oldpassword" class="input" type="text" placeholder="Antiga Contrasenya">

<br>

<input name="newpassword" class="input" type="text" placeholder="Nova Contrasenya">

<br>

<input name="re-newpassword" class="input" type="text" placeholder="Repeteix Nova Contrasenya">

<br>

<br>

<input type="submit" value="Cambiar">

</form>


    <?php
    
    include './controller/controlador_perfil.php';

    ?>




</body>
</html>