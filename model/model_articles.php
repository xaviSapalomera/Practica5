<?php
//Xavi Gallego Palau

require_once 'env.php';

//Actualitza el titol del article
function actualitzarArticle($titol,$cos,$id)
{
    try {
        
        $connexio = new PDO('mysql:host=' . SERVER . ';dbname=' . DATABASE, USER_DB, PASS_DB);

        
        $stm = $connexio->prepare("UPDATE articles SET titol = ?, cos = ? WHERE id = ?");
    
        
        $stm->execute([$titol,$cos, $id]);
    
    } catch (PDOException $e) {
        
        echo "Error: " . $e->getMessage();
    
    }
}
function trobarArticlePerID($id) {
    try {

        $connexio = new PDO('mysql:host=' . SERVER . ';dbname=' . DATABASE, USER_DB, PASS_DB);

        $stmt = $connexio->prepare('SELECT titol, cos FROM articles WHERE id = ? LIMIT 1');

        $stmt->execute([$id]);

        $resultat = $stmt->fetch();

        return $resultat ? $resultat : null;

    } catch (PDOException $e) {
        // Log the error for debugging purposes
        error_log("Error " . $e->getMessage());
    }
}
//Aquesta funcio serveix per crear Articles.
function introduirArticles($titol, $cos,$data,$user_id)
{
    try {
        $connexio = new PDO('mysql:host=' . SERVER . ';dbname=' . DATABASE, USER_DB, PASS_DB);

        $insert_Articles = $connexio->prepare("INSERT INTO articles(titol,cos,data,user_id) VALUES (?,?,?,?)");

        $insert_Articles->execute([$titol, $cos,$data,$user_id]);

        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

//Mostra tots els articles
function mostrarTotsArticles()
{
    try {
        $connexio = new PDO('mysql:host=' . SERVER . ';dbname=' . DATABASE, USER_DB, PASS_DB);

        $stmt = $connexio->prepare("SELECT id,titol,cos,data,user_id FROM articles");

        $stmt->execute();

        $resultats = $stmt->fetchAll();

        return $resultats;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

//Els articles per id
function borrarArticles($id)
{
    try {
        $connexio = new PDO('mysql:host=' . SERVER . ';dbname=' . DATABASE, USER_DB, PASS_DB);

        $stm = $connexio->prepare("DELETE FROM articles WHERE id=?");

        $stm->execute([$id]);
    } catch (PDOException $e) {
        echo "Error " . $e->getMessage();
    }
}
//mostra els articles ordernats per id de forma descendent
function mostrarArticlesOrdenatsIDdesc(){
    try {
		$connexio = new PDO('mysql:host=' . SERVER . ';dbname=' . DATABASE, USER_DB, PASS_DB);

		$stmt = $connexio->prepare('SELECT id,titol,cos,data,user_id FROM articles ORDER BY id DESC');
		
		$stmt->execute();

		$resultats = $stmt->fetchAll();

		return $resultats;

	}catch(PDOException $e){

		echo "Error: ". $e->getMessage();
	
	}
}
//mostra els articles ordernats per id de forma ascendent
function mostrarArticlesOrdenatsIDasc(){
    try {
		$connexio = new PDO('mysql:host=' . SERVER . ';dbname=' . DATABASE, USER_DB, PASS_DB);

		$stmt = $connexio->prepare('SELECT id,titol,cos,data,user_id FROM articles ORDER BY id ASC');
		
		$stmt->execute();

		$resultats = $stmt->fetchAll();

		return $resultats;

	}catch(PDOException $e){

		echo "Error: ". $e->getMessage();
	
	}
}

//mostra els articles ordernats per titol de forma ascendent
function mostrarArticlesOrdenatsTitolAsc(){
    try {
		$connexio = new PDO('mysql:host=' . SERVER . ';dbname=' . DATABASE, USER_DB, PASS_DB);

		$stmt = $connexio->prepare('SELECT id,titol,cos,data,user_id FROM articles ORDER BY titol ASC');
		
		$stmt->execute();

		$resultats = $stmt->fetchAll();

		return $resultats;

	}catch(PDOException $e){

		echo "Error: ". $e->getMessage();
	
	}
}

//mostra els articles ordernats per titol de forma descendent
function mostrarArticlesOrdenatsTitolDesc(){
    
    try {
		$connexio = new PDO('mysql:host=' . SERVER . ';dbname=' . DATABASE, USER_DB, PASS_DB);

		$stmt = $connexio->prepare('SELECT id,titol,cos,data,user_id FROM articles ORDER BY titol DESC');
		
		$stmt->execute();

		$resultats = $stmt->fetchAll();

		return $resultats;

	}catch(PDOException $e){

		echo "Error: ". $e->getMessage();
	
	}
}
