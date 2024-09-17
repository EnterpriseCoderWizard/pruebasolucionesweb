<?php
require_once '../config/globals.php';

class Database {
    private static $connection = null;

    public static function getConnection() {
        if (self::$connection === null) {
            try {
                self::$connection = new PDO(
                    "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, 
                    DB_USER, 
                    DB_PASSWORD
                );
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Error de conexión: " . $e->getMessage()); // Usé die() para detener la ejecución si hay error
            }
        }
        return self::$connection;
    }
}
?>
