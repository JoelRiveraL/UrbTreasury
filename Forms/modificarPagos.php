<?php
session_start();

$data = json_decode(file_get_contents("php://input"));

if (isset($data->editsPagos) && !empty($data->editsPagos)) {
    require_once('conexionMySql.php');

    foreach ($data->editsPagos as $pago) {
        $id = intval($pago[0]);
        $cedula = $pago[1];
        $fecha = $pago[3];
        $monto = $pago[4];
        $tipo = $pago[5];
        $observaciones = $pago[6];

        $sql = "UPDATE pago SET montoP = '$monto', tipoP = '$tipo', fechaP = '$fecha', observacionesP = '$observaciones', residenteP = '$cedula' WHERE idPago = $id";

        if ($conn->query($sql) === FALSE) {
            echo "Error al modificar pago: " . $conn->error;
        }
    }

    $mensajeModificar = "Pagos modificados exitosamente";
    $_SESSION['mensajeModificar'] = $mensajeModificar;
} else {
    $mensajeModificar = "No se recibieron datos válidos";
}


