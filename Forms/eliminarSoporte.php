<?php
session_start();

$data = json_decode(file_get_contents("php://input"));

if (isset($data->idSoporteBorrar) && !empty($data->idSoporteBorrar)) {
    require_once('conexionMySql.php');

    // Obtener la instancia de la base de datos
    $db = Database::getInstance();
    $conn = $db->getConnection();

    $idSoporteBorrar = intval($data->idSoporteBorrar);

    $sql = "DELETE FROM soporte WHERE idSoporte = $idSoporteBorrar";

    if ($conn->query($sql) === FALSE) {
        echo "Error al eliminar Soporte: " . $conn->error;
    }

    $mensajeModificar = "Soporte eliminado exitosamente";
    $_SESSION['mensajeModificar'] = $mensajeModificar;
} else {
    $mensajeModificar = "No se recibieron datos válidos";
}
