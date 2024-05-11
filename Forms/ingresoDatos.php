<?php

function ingresoResidentes($cedula, $nombre, $apellido, $correo, $telefono, $departamento)
{
    $ingresado = false;
    $enviado = true;

    include 'conexionMySql.php';

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
            $mensaje = "Error al insertar datos: ";
        }
    } else {
        $mensaje = "¡Datos ya existentes!";
    }

    // Cierra la conexión a la base de datos.
    $conn->close();

    $_SESSION['ingresado'] = $ingresado;
    $_SESSION['enviado'] = $enviado;
    $_SESSION['id'] = $cedula;

    return $mensaje;
}
