<?php
require_once 'Pago.php';

class PagoEspecial extends Pago {
    private $descuento;

    public function __construct($monto, $tipo, $fecha, $observaciones, $residenteId, $descuento) {
        parent::__construct($monto, $tipo, $fecha, $observaciones, $residenteId);
        $this->descuento = $descuento;
    }

    public function registrar() {
        $this->monto -= $this->descuento;
        return parent::registrar();
    }
}