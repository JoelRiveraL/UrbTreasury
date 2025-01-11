<?php
session_start();

$data = json_decode(file_get_contents("php://input"));

if (isset($data->soporteData) && !empty($data->soporteData)) {
    require_once '../Models/Soporte.php';

    $nombre = $data->soporteData[0];
    $telefono = $data->soporteData[1];
    $email = $data->soporteData[2];
    $nombreEncargado = $data->soporteData[3];
    $descripcion = $data->soporteData[4];

    $soporte = new Soporte($nombre, $telefono, $email, $nombreEncargado, $descripcion);
    $mensaje = $soporte->registrar();

    if (strpos($mensaje, 'Error') !== false) {
        echo $mensaje;
    } else {
        $mensajeModificar = $mensaje;
        $_SESSION['mensajeModificar'] = $mensajeModificar;
    }
} else {
    $mensajeModificar = "No se recibieron datos válidos";
}