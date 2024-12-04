<?php
$emailValidad = null;
    include './model/model_usuaris.php';


    if(isset($_POST['nom']) && isset($_POST["cognom"]) && isset($_POST['dni']) && isset($_POST["email"]) && isset($_POST['contrasenya'])){

        $nom = $_POST["nom"];

        $cognom = $_POST['cognom'];

        $dni = $_POST['dni'];
        
        $email_POST = $_POST["email"];

        $contrasenya = $_POST['contrasenya'];

        $contrasenya_hash = hash('sha256', $contrasenya);

        $emailValidad = comprobarEmail($email_POST);


        if($emailValidad){
    
            crearUsuari($dni,$nom,$cognom,$email_POST,$contrasenya_hash);

            header('Location: index.php');
    
        }else if (!$emailValidad){
        
            echo '<p style="text-align: center;">' . 'El usuari ja existeix' . '</p>';

        }
        
    }
    else{
        $nom = "";
        $cognom = "";
        $dni = "";
        $email_POST = '';
        $email_comprovat = '';
        $contrasenya = '';
        $contrasenya_hash = '';
    }

        

function comprobarEmail($email_POST){


$usuaris = mostrarUsuaris();

        foreach($usuaris as $usuari){
        
            if($usuari['email'] == $email_POST){

                return false;

                

            }else{

                return true;
                
            

            }
        
        } 
    } 
?>