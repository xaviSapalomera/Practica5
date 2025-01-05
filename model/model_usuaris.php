<?php

require_once 'env.php';

//Per crear un usuari
function crearUsuari($dni,$nom,$cognom,$email,$contrasenya){

	try{
        $connexio = new PDO('mysql:host=' . SERVER . ';dbname=' . DATABASE, USER_DB, PASS_DB);

		$inserta_Usuaris = $connexio->prepare('INSERT INTO usuaris(dni,nom,cognom,email,contrasenya) VALUES (?,?,?,?,?)');

		$inserta_Usuaris->execute([$dni,$nom,$cognom,$email,$contrasenya]);

	}catch(PDOException $e){
		echo "Error: ". $e->getMessage();
	}

}

//Mostrar tots els usuaris
function mostrarUsuaris(){
	try{
		$connexio = new PDO('mysql:host=' . SERVER . ';dbname=' . DATABASE, USER_DB, PASS_DB);

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
		$connexio = new PDO('mysql:host=' . SERVER . ';dbname=' . DATABASE, USER_DB, PASS_DB);

		$stmt = $connexio->prepare('SELECT id,nickname,nom,cognom,dni,email,contrasenya FROM usuaris WHERE email = ? LIMIT 1');
		
		$stmt->execute([$email]);

		$resultats = $stmt->fetchAll();

		return $resultats;

	}catch(PDOException $e){

		echo "Error: ". $e->getMessage();
	
	}
}
//Filtra el usuari per la seva id
function filtrarUsuarisPerID($id) {
    try {
        // Establish database connection using PDO
        $connexio = new PDO('mysql:host=' . SERVER . ';dbname=' . DATABASE, USER_DB, PASS_DB);
        
        // Prepare SQL statement with a parameter placeholder
        $stmt = $connexio->prepare('SELECT id, nickname, nom, cognom, dni, email, contrasenya FROM usuaris WHERE id = ? LIMIT 1');
        
        // Execute the prepared statement with the actual ID parameter
        $stmt->execute([$id]);
        
        // Fetch the result (as an associative array)
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);

        // Return the result if found, otherwise null
        return $resultat ? $resultat : null;

    } catch(PDOException $e) {
        // Log error for debugging
        error_log("Database error: " . $e->getMessage());

        // Return null or false in case of an error
        return null;
    }
}



//actualitza la password de la sesio on esta iniciada
function actualitzarPassword($id, $password) {
    try {
        
        $password_hash = hash("sha256", $password);

        $connexio = new PDO('mysql:host=' . SERVER . ';dbname=' . DATABASE, USER_DB, PASS_DB);
        
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

        $connexio = new PDO('mysql:host=' . SERVER . ';dbname=' . DATABASE, USER_DB, PASS_DB);
        
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