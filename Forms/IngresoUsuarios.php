<?php

function ingresoUsuarios($usuario, $contrasenia, $passwordValidar, $cedula)
{
    if ($contrasenia == $passwordValidar) {
        require('conexionMySql.php');

        // Obtener la instancia de la base de datos
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $nombreTabla = 'usuario';

        $sqlExistente = "SELECT * FROM $nombreTabla WHERE usuarioU = ?";

        $stmtExistente = $conn->prepare($sqlExistente);
        $stmtExistente->bind_param("s", $usuario);
        $stmtExistente->execute();
        $resultExistente = $stmtExistente->get_result();

        if ($resultExistente->num_rows == 0) {
            $sqlInsertar = "INSERT INTO $nombreTabla (usuarioU, passwordU, cedulaResidenteU) VALUES (?, ?, ?)";

            $stmtInsertar = $conn->prepare($sqlInsertar);
            $stmtInsertar->bind_param("sss", $usuario, $contrasenia, $cedula);
            $stmtInsertar->execute();

            $mensajeSignUp = "¡Usuario creado con éxito!";
            $enviado = true;
            $ingresado = true;
        } else {
            $mensajeSignUp = "Usuario ya existente!";
            $enviado = true;
        }

        $stmtExistente->close();
        $stmtInsertar->close();
    } else {
        $mensajeSignUp = "Las contraseñas no coinciden!";
        $enviado = false;
        $ingresado = false;
    }

    return $mensajeSignUp;
}
