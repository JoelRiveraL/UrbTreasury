<?php
function residenteExistente($cedula)
{
    include_once('conexionMySql.php');

    $nombreTabla = 'residente';

    $sql = "SELECT * FROM $nombreTabla WHERE cedulaR = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $cedula);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si hay al menos una fila en el resultado
    if ($result->num_rows > 0) {
        // El residente existe
        $userData = $result->fetch_assoc();
        return true;
    } else {
        // El residente no existe
        return false;
    }
}
