<?php
session_start();

$data = json_decode(file_get_contents("php://input"));

if (isset($data->idsResidentes) && !empty($data->idsResidentes)) {
    require_once('conexionMySql.php');

    foreach ($data->idsResidentes as $idResidente) {
        $idResidente = intval($idResidente);

        $sql = "DELETE FROM residente WHERE idResidentes = $idResidente";

        if ($conn->query($sql) === FALSE) {
            echo "Error al eliminar pago: " . $conn->error;
        }
    }

    $conn->close();

    $mensajeEliminar = "Residentes eliminados exitosamente";

    $_SESSION['mensajeEliminar'] = $mensajeEliminar;
} else {
    $mensajeEliminar = "No se recibieron datos válidos";
}
