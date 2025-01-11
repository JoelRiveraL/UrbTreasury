<?php
require_once '../Forms/conexionMySql.php';

class Pago {
    private $id;
    private $monto;
    private $tipo;
    private $fecha;
    private $observaciones;
    private $residenteId;
    private $conn;

    public function __construct($monto = null, $tipo = null, $fecha = null, $observaciones = null, $residenteId = null, $id = null) {
        $this->id = $id;
        $this->monto = $monto;
        $this->tipo = $tipo;
        $this->fecha = $fecha;
        $this->observaciones = $observaciones;
        $this->residenteId = $residenteId;

        // Obtener la instancia de la base de datos
        $db = Database::getInstance();
        $this->conn = $db->getConnection();
    }

    public function registrar() {
        $sql = "INSERT INTO pago (montoP, tipoP, fechaP, observacionesP, residenteP) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("dssss", $this->monto, $this->tipo, $this->fecha, $this->observaciones, $this->residenteId);

        if ($stmt->execute()) {
            $_SESSION['ingresadoPagos'] = true;
            $_SESSION['enviadoPagos'] = true;
            return "¡Pago registrado con éxito!";
        } else {
            $_SESSION['ingresadoPagos'] = false;
            $_SESSION['enviadoPagos'] = true;
            return "Error al registrar el pago: " . $stmt->error;
        }
    }

    public function actualizar() {
        $sql = "UPDATE pago SET montoP = ?, tipoP = ?, fechaP = ?, observacionesP = ?, residenteP = ? WHERE idPago = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("dssssi", $this->monto, $this->tipo, $this->fecha, $this->observaciones, $this->residenteId, $this->id);

        if ($stmt->execute()) {
            return "¡Pago actualizado con éxito!";
        } else {
            return "Error al actualizar el pago: " . $stmt->error;
        }
    }

    public function eliminar() {
        $sql = "DELETE FROM pago WHERE idPago = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $this->id);

        if ($stmt->execute()) {
            return "¡Pago eliminado con éxito!";
        } else {
            return "Error al eliminar el pago: " . $stmt->error;
        }
    }
}