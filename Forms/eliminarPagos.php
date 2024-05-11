<?php
session_start();

$data = json_decode(file_get_contents("php://input"));

if (isset($data->idsPagos) && !empty($data->idsPagos)) {
    require_once('conexionMySql.php');

    foreach ($data->idsPagos as $idResidente) {
        $idResidente = intval($idResidente);

        $sql = "DELETE FROM pago WHERE idPago = $idResidente";

        if ($conn->query($sql) === FALSE) {
            echo "Error al eliminar pago: " . $conn->error;
        }
    }

    $conn->close();

    $mensajeEliminar = "Pagos eliminados exitosamente";

    $_SESSION['mensajeEliminar'] = $mensajeEliminar;
} else {
    $mensajeEliminar = "No se recibieron datos válidos";
}
