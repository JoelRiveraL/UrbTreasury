<?php
class Database {
    private static $instance = null;
    private $conn;

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "urbanizationtreasurysystem";

    private function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname, 3306);

        if ($this->conn->connect_error) {
            die("Conexión fallida: " . $this->conn->connect_error);
        }
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }
}
