<?php
require_once '../Models/Usuario.php';

function ingresoUsuarios($usuario, $contrasenia, $passwordValidar, $cedula)
{
    if ($contrasenia == $passwordValidar) {
        $usuarioObj = new Usuario($usuario, $contrasenia, $cedula);
        $mensajeSignUp = $usuarioObj->registrar();
    } else {
        $mensajeSignUp = "Las contraseñas no coinciden!";
    }

    return $mensajeSignUp;
}