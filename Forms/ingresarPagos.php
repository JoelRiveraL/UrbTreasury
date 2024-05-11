<?php
function ingresoPagos($pagos, $tipo, $fecha, $observaciones, $id)
{
    include 'conexionMySql.php';

    $ingresadoPagos = false;
    $enviadoPagos = true;

    $sql = "INSERT INTO pago (montoP, tipoP, fechaP, observacionesP, residenteP) VALUES ('$pagos', '$tipo', '$fecha', '$observaciones', '$id')";

    if ($conn->query($sql) === TRUE) {
        $ingresadoPagos = true;
        $mensaje = "¡Pago registrado con éxito!";
    } else {
        $mensaje = "Error al registrar el pago";
    }

    $conn->close();

    $_SESSION['ingresadoPagos'] = $ingresadoPagos;
    $_SESSION['enviadoPagos'] = $enviadoPagos;

    return $mensaje;
}
