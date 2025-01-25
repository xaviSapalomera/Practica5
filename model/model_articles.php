<?php

require_once './env.php';

class Article {
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

    public function actualitzarArticle($titol, $cos, $id) {
        try {
            $stmt = $this->connexio->prepare("UPDATE articles SET titol = ?, cos = ? WHERE id = ?");
            $stmt->execute([$titol,$cos,$id]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log("Error al actualitzar nickname: " . $e->getMessage());
            return false;
        }
    }

    public function trobarArticlePerID($id) {
        try {
            $stmt = $this->connexio->prepare('SELECT titol, cos FROM articles WHERE id = ? LIMIT 1');
            $stmt->execute([$id]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            error_log("Error al obtener artículo por ID: " . $e->getMessage());
            return null;
        }
    }

    public function introduirArticles($titol, $cos, $data, $user_id) {
        try {
            $stmt = $this->connexio->prepare("INSERT INTO articles (titol, cos, data, user_id) VALUES (?, ?, ?, ?)");
          
            return $stmt->execute([$titol, $cos, $data, $user_id]);
        
        } catch (PDOException $e) {
        
            error_log("Error al insertar artículo: " . $e->getMessage());
        
            return false;
        
        }
    
    }

    public function mostrarTotsArticles() {
        try {
            $stmt = $this->connexio->query("SELECT id, titol, cos, data, user_id FROM articles");
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Error al mostrar todos los artículos: " . $e->getMessage());
            return [];
        }
    }

    public function borrarArticles($id) {
        try {
            $stmt = $this->connexio->prepare("DELETE FROM articles WHERE id = ?");
            return $stmt->execute([$id]);
        } catch (PDOException $e) {
            error_log("Error al borrar artículo: " . $e->getMessage());
            return false;
        }
    }

    public function mostrarArticlesOrdenats($columna, $ordre) {
        $columnasPermitidas = ['id', 'titol'];
        $ordenesPermitidos = ['ASC', 'DESC'];

        if (!in_array($columna, $columnasPermitidas) || !in_array($ordre, $ordenesPermitidos)) {
            throw new InvalidArgumentException("Columna o el ordre no válid.");
        }

        try {
            $stmt = $this->connexio->prepare("SELECT id, titol, cos, data, user_id FROM articles ORDER BY $columna $ordre");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Error al mostrar artículos ordenados: " . $e->getMessage());
            return [];
        }
    }
}
