<?php
session_start();

$data = json_decode(file_get_contents("php://input"));

if (isset($data->idsPagos) && !empty($data->idsPagos)) {
    require_once '../Models/Pago.php';

    foreach ($data->idsPagos as $idPago) {
        $idPago = intval($idPago);

        $pago = new Pago(null, null, null, null, null, $idPago);
        $mensaje = $pago->eliminar();

        if (strpos($mensaje, 'Error') !== false) {
            echo $mensaje;
        }
    }

    $mensajeEliminar = "Pagos eliminados exitosamente";
    $_SESSION['mensajeEliminar'] = $mensajeEliminar;
} else {
    $mensajeEliminar = "No se recibieron datos válidos";
}