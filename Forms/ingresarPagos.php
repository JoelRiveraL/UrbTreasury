<?php
require_once '../Models/Pago.php';

function ingresoPagos($pagos, $tipo, $fecha, $observaciones, $id)
{
    $pago = new Pago($pagos, $tipo, $fecha, $observaciones, $id);
    $mensaje = $pago->registrar();

    return $mensaje;
}