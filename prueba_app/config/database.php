<?php

class Database
{
    private static $host = 'localhost';
    private static $dbName = 'prueba_backend'; 
    private static $username = 'prueba_user';
    private static $password = '123456';
    private static $conn;

    public static function getConnection()
    {
        if (self::$conn === null) {
            try {
                self::$conn = new PDO(
                    "mysql:host=" . self::$host . ";dbname=" . self::$dbName . ";charset=utf8mb4",
                    self::$username,
                    self::$password
                );
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("❌ Error de conexión: " . $e->getMessage());
            }
        }
        return self::$conn;
    }
}
?>