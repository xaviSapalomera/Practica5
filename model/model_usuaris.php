<?php
require_once './env.php';

class Usuari {
    private $connexio;

    public function __construct() {
        try {
            $this->connexio = new PDO(
                'mysql:host=' . SERVER . ';dbname=' . DATABASE,
                USER_DB,
                PASS_DB,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]
            );
        } catch (PDOException $e) {
            die("Error al conectar a la base de datos: " . $e->getMessage());
        }
    }

    public function crearUsuari($dni, $nom, $cognom, $email, $contrasenya) {
        try {
            $stmt = $this->connexio->prepare(
                'INSERT INTO usuaris (dni, nom, cognom, email, contrasenya) VALUES (?, ?, ?, ?, ?)'
            );
            $stmt->execute([$dni, $nom, $cognom, $email, password_hash($contrasenya, PASSWORD_BCRYPT)]);
            return $this->connexio->lastInsertId();
        } catch (PDOException $e) {
            error_log("Error al crear usuario: " . $e->getMessage());
            return false;
        }
    }

    public function mostrarUsuaris() {
        try {   
            $stmt = $this->connexio->query('SELECT id, nom, nickname, cognom, dni, email, contrasenya, admin FROM usuaris');
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Error al mostrar usuarios: " . $e->getMessage());
            return [];
        }
    }

    public function perfilDades($email) {
        try {
            $stmt = $this->connexio->prepare('SELECT id, nickname, nom, cognom, dni, email, contrasenya FROM usuaris WHERE email = ? LIMIT 1');
            $stmt->execute([$email]);
            return $stmt->fetch(); // Retorna solo un registro
        } catch (PDOException $e) {
            error_log("Error al obtenir perfil per a l'email $email: " . $e->getMessage());
            return null;
        }
    }

    public function actualitzarPassword($id, $password) {
        try {
            $password_hash = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $this->connexio->prepare('UPDATE usuaris SET contrasenya = ? WHERE id = ?');
            $stmt->execute([$password_hash, $id]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log("Error al actualitzar contrasenya: " . $e->getMessage());
            return false;
        }
    }

    public function actualitzarNickname($id, $nickname) {
        try {
            $stmt = $this->connexio->prepare('UPDATE usuaris SET nickname = ? WHERE id = ?');
            $stmt->execute([$nickname, $id]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log("Error al actualitzar nickname: " . $e->getMessage());
            return false;
        }
    }
    public function actualitzarEmail($id, $correu) {
        try {
            $stmt = $this->connexio->prepare('UPDATE usuaris SET correu = ? WHERE id = ?');
            $stmt->execute([$correu, $id]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log("Error al actualitzar nickname: " . $e->getMessage());
            return false;
        }
    }

    public function filtrarUsuarisPerID($id) {
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
}

?>
