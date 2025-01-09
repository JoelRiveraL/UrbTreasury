<?php
function ingresoPagos($pagos, $tipo, $fecha, $observaciones, $id)
{
    require_once 'conexionMySql.php';

    // Obtener la instancia de la base de datos
    $db = Database::getInstance();
    $conn = $db->getConnection();

    $ingresadoPagos = false;
    $enviadoPagos = true;

    $sql = "INSERT INTO pago (montoP, tipoP, fechaP, observacionesP, residenteP) VALUES ('$pagos', '$tipo', '$fecha', '$observaciones', '$id')";

    if ($conn->query($sql) === TRUE) {
        $ingresadoPagos = true;
        $mensaje = "¡Pago registrado con éxito!";
    } else {
        $mensaje = "Error al registrar el pago: " . $conn->error;
    }

    $_SESSION['ingresadoPagos'] = $ingresadoPagos;
    $_SESSION['enviadoPagos'] = $enviadoPagos;

    return $mensaje;
}
