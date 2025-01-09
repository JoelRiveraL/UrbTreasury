<?php

function ingresoResidentes($cedula, $nombre, $apellido, $correo, $telefono, $departamento)
{
    $ingresado = false;
    $enviado = true;

    require_once 'conexionMySql.php';

    // Obtener la instancia de la base de datos
    $db = Database::getInstance();
    $conn = $db->getConnection();

    // Verifica si los datos ya existen en la tabla.
    $sqlExistente = "SELECT * FROM residente WHERE cedulaR = '$cedula' AND nombreR = '$nombre' AND apellidoR = '$apellido' AND correoR = '$correo' AND telefonoR = '$telefono' AND loteR = '$departamento'";
    $resultExistente = $conn->query($sqlExistente);

    if ($resultExistente->num_rows == 0) {
        // Si los datos no existen, realiza la inserción.
        $sqlInsertar = "INSERT INTO residente (cedulaR, nombreR, apellidoR, correoR, telefonoR, loteR) VALUES ('$cedula', '$nombre', '$apellido', '$correo', '$telefono', '$departamento')";

        if ($conn->query($sqlInsertar) === TRUE) {
            $ingresado = true;
            $mensaje = "¡Datos enviados con éxito!";
        } else {
            $mensaje = "Error al insertar datos: " . $conn->error;
        }
    } else {
        $mensaje = "¡Datos ya existentes!";
    }


    return $mensaje;
}
