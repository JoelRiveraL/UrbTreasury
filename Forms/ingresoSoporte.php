<?php
session_start();

$data = json_decode(file_get_contents("php://input"));

if (isset($data->soporteData) && !empty($data->soporteData)) {
    include 'conexionMySql.php';

    $nombre = $data->soporteData[0];
    $telefono = $data->soporteData[1];
    $email = $data->soporteData[2];
    $nombreEncargado = $data->soporteData[3];
    $descripcion = $data->soporteData[4];

    $sql = "INSERT INTO soporte (nombreS, telefonoS, correoS, contactoS, descripcionS) VALUES ('$nombre', '$telefono', '$email', '$nombreEncargado', '$descripcion')";

    if ($conn->query($sql) === FALSE) {
        echo "Error al ingresar soporte: " . $conn->error;
    }


    $mensajeModificar = "Soporte ingresado exitosamente";
    $_SESSION['mensajeModificar'] = $mensajeModificar;
} else {
    $mensajeModificar = "No se recibieron datos válidos";
}
