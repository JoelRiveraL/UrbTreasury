<?php
session_start();

$data = json_decode(file_get_contents("php://input"));

if (isset($data->editsPagos) && !empty($data->editsPagos)) {
    require_once '../Models/Pago.php';

    foreach ($data->editsPagos as $pagoData) {
        $id = intval($pagoData[0]);
        $cedula = $pagoData[1];
        $fecha = $pagoData[3];
        $monto = $pagoData[4];
        $tipo = $pagoData[5];
        $observaciones = $pagoData[6];

        $pago = new Pago($monto, $tipo, $fecha, $observaciones, $cedula, $id);
        $mensaje = $pago->actualizar();

        if (strpos($mensaje, 'Error') !== false) {
            echo $mensaje;
        }
    }

    $mensajeModificar = "Pagos modificados exitosamente";
    $_SESSION['mensajeModificar'] = $mensajeModificar;
} else {
    $mensajeModificar = "No se recibieron datos válidos";
}


