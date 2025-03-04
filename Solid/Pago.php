<?php
require_once 'Database.php';

class Pago {
    protected $monto;
    protected $tipo;
    protected $fecha;
    protected $observaciones;
    protected $residenteId;
    protected $conn;

    public function __construct($monto, $tipo, $fecha, $observaciones, $residenteId) {
        $this->monto = $monto;
        $this->tipo = $tipo;
        $this->fecha = $fecha;
        $this->observaciones = $observaciones;
        $this->residenteId = $residenteId;

        $db = Database::getInstance();
        $this->conn = $db->getConnection();
    }

    public function registrar() {
        $sql = "INSERT INTO pago (montoP, tipoP, fechaP, observacionesP, residenteP) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("dssss", $this->monto, $this->tipo, $this->fecha, $this->observaciones, $this->residenteId);

        if ($stmt->execute()) {
            return "¡Pago registrado con éxito!";
        } else {
            return "Error al registrar el pago: " . $stmt->error;
        }
    }
}