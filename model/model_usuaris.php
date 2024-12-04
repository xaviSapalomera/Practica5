<?php

//Per crear un usuari
function crearUsuari($dni,$nom,$cognom,$email,$contrasenya){

	try{
		$connexio = new PDO('mysql:host=localhost;dbname=ptxy_xavi_gallego', 'root', '');

		$inserta_Usuaris = $connexio->prepare('INSERT INTO usuaris(dni,nom,cognom,email,contrasenya) VALUES (?,?,?,?,?)');

		$inserta_Usuaris->execute([$dni,$nom,$cognom,$email,$contrasenya]);

	}catch(PDOException $e){
		echo "Error: ". $e->getMessage();
	}

}

//Mostrar tots els usuaris
function mostrarUsuaris(){
	try{
		$connexio = new PDO('mysql:host=localhost;dbname=ptxy_xavi_gallego', 'root', '');

		$stmt = $connexio->prepare('SELECT id,nom,cognom,dni,email,contrasenya FROM usuaris');
		
		$stmt->execute();

		$resultats = $stmt->fetchAll();

		return $resultats;

	}catch(PDOException $e){

		echo "Error: ". $e->getMessage();
	
	}
}

//Mostra les dades del usuari introduin de parametre el email
function perfilDades($email) {
    try {
		$connexio = new PDO('mysql:host=localhost;dbname=ptxy_xavi_gallego', 'root', '');

		$stmt = $connexio->prepare('SELECT id,nickname,nom,cognom,dni,email,contrasenya FROM usuaris WHERE email = ? LIMIT 1');
		
		$stmt->execute([$email]);

		$resultats = $stmt->fetchAll();

		return $resultats;

	}catch(PDOException $e){

		echo "Error: ". $e->getMessage();
	
	}
}

//actualitza la password de la sesio on esta iniciada
function actualitzarPassword($id, $password) {
    try {
        
        $password_hash = hash("sha256", $password);

        $connexio = new PDO('mysql:host=localhost;dbname=ptxy_xavi_gallego', 'root', '');
        
		$stmt = $connexio->prepare('UPDATE usuaris SET contrasenya = ? WHERE id = ?');
        
		$stmt->execute([$password_hash, $id]);

        if ($stmt->rowCount() > 0) {
        
			echo "<h1 style='color:white'> Contraseña actualizada correctamente.</h1>";
        
		} else {
        
			echo "<h1 style='color:white'> No se ha encontrado el usuario o la contraseña no ha cambiado.</h1>";
        
		}

    } catch (PDOException $e) {
        
		echo "Error: ". $e->getMessage();
    
	}
}

//Actualitza el nickname del conta amb la que has iniciat 
function actualitzarNickname($id, $nickname) {
    try {

        $connexio = new PDO('mysql:host=localhost;dbname=ptxy_xavi_gallego', 'root', '');
        
		$stmt = $connexio->prepare('UPDATE usuaris SET nickname = ? WHERE id = ?');
        
		$stmt->execute([$nickname, $id]);

        if ($stmt->rowCount() > 0) {
			echo 'BIEN';
		}else{
			echo 'ERROR';
		}

    } catch (PDOException $e) {
        
		echo "Error: ". $e->getMessage();
    
	}
}
?>