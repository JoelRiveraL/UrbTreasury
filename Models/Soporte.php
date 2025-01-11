<?php
require_once '../Forms/conexionMySql.php';

class Soporte {
    private $id;
    private $nombre;
    private $telefono;
    private $email;
    private $nombreEncargado;
    private $descripcion;
    private $conn;

    public function __construct($nombre = null, $telefono = null, $email = null, $nombreEncargado = null, $descripcion = null, $id = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->nombreEncargado = $nombreEncargado;
        $this->descripcion = $descripcion;

        // Obtener la instancia de la base de datos
        $db = Database::getInstance();
        $this->conn = $db->getConnection();
    }

    public function registrar() {
        $sql = "INSERT INTO soporte (nombreS, telefonoS, correoS, contactoS, descripcionS) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssss", $this->nombre, $this->telefono, $this->email, $this->nombreEncargado, $this->descripcion);

        if ($stmt->execute()) {
            return "¡Soporte ingresado con éxito!";
        } else {
            return "Error al ingresar soporte: " . $stmt->error;
        }
    }

    public function eliminar() {
        $sql = "DELETE FROM soporte WHERE idSoporte = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $this->id);

        if ($stmt->execute()) {
            return "¡Soporte eliminado con éxito!";
        } else {
            return "Error al eliminar el soporte: " . $stmt->error;
        }
    }
}