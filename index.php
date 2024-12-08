<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Articles</title>
    <link rel="stylesheet" href="./estil/estil_sesion.css">
    <link rel="shortcut icon" href="./photos/icon_dtm.webp" />
</head>
<body>

<?php
session_start();
?>
<!-- Xavi Gallego -->
<div class="header">
<form class="boto" action="login_vista.php">
    <input class="boto_header" type="submit" value="Login" />
</form>
<form class="boto" action="registrarse_vista.php">
    <input class="boto_header" type="submit" value="Registrarse" />
</form>
</div>

<div style="margin-top: 30px">
<?php 



include './controller/controlador_index.php';

include './controller/controlador_login.php';

?>
</div>



</body>
</html>
