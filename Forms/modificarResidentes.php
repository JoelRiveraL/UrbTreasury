<?php
session_start();

$data = json_decode(file_get_contents("php://input"));

if (isset($data->editsRes) && !empty($data->editsRes)) {
    require_once('conexionMySql.php');

    foreach ($data->editsRes as $residente) {
        $id = intval($residente[0]);
        $cedula = $residente[1];
        $nombre = $residente[2];
        $apellido = $residente[3];
        $correo = $residente[4];
        $telefono = $residente[5];
        $lote = $residente[6];

        $sql = "UPDATE residente SET cedulaR = '$cedula', nombreR = '$nombre', apellidoR = '$apellido', correoR = '$correo', telefonoR = '$telefono', loteR = '$lote' WHERE idResidentes = $id";

        if ($conn->query($sql) === FALSE) {
            echo "Error al modificar pago: " . $conn->error;
        }
    }

    $mensajeIngresadoSop = "Residentes modificados exitosamente";
    $_SESSION['mensajeIngresadoSop'] = $mensajeIngresadoSop;
} else {
    $mensajeIngresadoSop = "No se recibieron datos válidos";
}
