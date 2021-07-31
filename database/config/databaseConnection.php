<?php
require_once 'database.php';

class DatabaseConnection
{
    private $pdo;

    public function __construct()
    {
        $host = Database::$host;
        $user = Database::$user;
        $password = Database::$password;
        $dbname = Database::$database;
        $charset = Database::$charset;

        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ];

        try {
            $this->pdo = new PDO($dsn, $user, $password, $options);
        }
        catch(Exception $ex) {
            var_dump($ex);
        }
    }

    public function getConnection() : PDO {
        return $this->pdo;
    }
}