<?php
include "./model/model_usuaris.php";

$correu = "";
session_start();

if ($_SESSION['correu']) {
      $correu = $_SESSION['correu'];


    $resultats = perfilDades($correu);

    if ($resultats) {
        foreach ($resultats as $resultat) {
            echo "<br>";
            echo "<div style='color:white;font-size:30px;'>";

            $id = $resultat['id'];

            echo "ID: " . $resultat["id"] . "<br><br>";

            echo "DNI: " . $resultat["dni"] . "<br><br>";

            echo "NICKNAME: " . $resultat["nickname"] . "<br><br>";

            echo "NOM: " . $resultat["nom"] . "<br><br>";

            echo "COGNOM: " . $resultat["cognom"] . "<br><br>";

            echo "CORREU: " . $resultat["email"] . "<br><br>";
            echo "</div>";


        }
    }

//actualitzar el nom del usuari
if(isset($_POST['nomUsuari'])){

    $nickname = $_POST['nomUsuari'];
            
    actualitzarNickname($id,$nickname);    

}

    if (isset($_POST["oldpassword"]) && isset($_POST["newpassword"]) && isset($_POST["re-newpassword"])) {
        
        $antiga_password = $_POST["oldpassword"];

        $nova_password = $_POST["newpassword"];

        $re_nova_password = $_POST["re-newpassword"];

        $contrasenya_antiga_hash = hash("sha256", $antiga_password);


        if ($resultats) {
            foreach ($resultats as $resultat) {
                if ($contrasenya_antiga_hash == $resultat["contrasenya"]) {

                    actualitzarPassword($id,$nova_password);

                    echo '<h1>'.$id.'</h1>';

                    echo "<h1>OK</h1>";
                } else {
                    echo "<h1>La contrasenya no es correcta</h1>";
                }
            }
        }
    } else {
        $antiga_password = "";
        $nova_password = "";
        $re_nova_password = "";
    }
} else {
    header("Location: login_vista.php");
}
exit();

?>
