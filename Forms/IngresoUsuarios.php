<?php

function ingresoUsuarios($usuario, $contrasenia, $passwordValidar, $cedula)
{
    if ($contrasenia == $passwordValidar) {
        require('conexionMySql.php');

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
            $ingresado = false;
        }
    } else {
        $mensajeSignUp = "Las contraseñas no coinciden";
        $enviado = true;
        $ingresado = false;
    }

    $_SESSION['mensaje'] = $mensajeSignUp;
    $_SESSION['enviado'] = $enviado;
    $_SESSION['ingresado'] = $ingresado;

    return $mensajeSignUp;
}
