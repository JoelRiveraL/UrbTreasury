<?php
require_once '../Forms/conexionMySql.php';

class Usuario {
    private $usuario;
    private $contrasenia;
    private $cedula;
    private $conn;

    public function __construct($usuario, $contrasenia, $cedula) {
        $this->usuario = $usuario;
        $this->contrasenia = $contrasenia;
        $this->cedula = $cedula;

        // Obtener la instancia de la base de datos
        $db = Database::getInstance();
        $this->conn = $db->getConnection();
    }

    public function registrar() {
        $nombreTabla = 'usuario';

        $sqlExistente = "SELECT * FROM $nombreTabla WHERE usuarioU = ?";
        $stmtExistente = $this->conn->prepare($sqlExistente);
        $stmtExistente->bind_param("s", $this->usuario);
        $stmtExistente->execute();
        $resultExistente = $stmtExistente->get_result();

        if ($resultExistente->num_rows == 0) {
            $sqlInsertar = "INSERT INTO $nombreTabla (usuarioU, passwordU, cedulaResidenteU) VALUES (?, ?, ?)";
            $stmtInsertar = $this->conn->prepare($sqlInsertar);
            $stmtInsertar->bind_param("sss", $this->usuario, $this->contrasenia, $this->cedula);

            if ($stmtInsertar->execute()) {
                return "¡Usuario creado con éxito!";
            } else {
                return "Error al crear el usuario: " . $stmtInsertar->error;
            }
        } else {
            return "Usuario ya existente!";
        }
    }

    public function login() {
        $nombreTabla = 'usuario';

        $sql = "SELECT * FROM $nombreTabla WHERE usuarioU = ? AND passwordU = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $this->usuario, $this->contrasenia);
        $stmt->execute();
        $result = $stmt->get_result();
        $userData = $result->fetch_assoc();

        if ($userData) {
            return $userData;
        } else {
            return false;
        }
    }
}