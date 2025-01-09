<?php
function ingresoComentario($usuario, $nombre, $email, $asunto)
{
    require_once 'conexionMySql.php';

    // Obtener la instancia de la base de datos
    $db = Database::getInstance();
    $conn = $db->getConnection();

    $fecha_hoy = date("Y-m-d");
    $sql = "INSERT INTO comentarios (usuarioResC, nombreResC, emailResC, asuntoC, fechaC) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $usuario, $nombre, $email, $asunto, $fecha_hoy);

    if ($stmt->execute()) {
        $mensaje = "Comentario enviado con éxito!";
    } else {
        $mensaje = "Error al enviar el comentario: " . $stmt->error;
    }

    $stmt->close();

    $_SESSION['nombreC'] = $nombre;
    $_SESSION['usuarioC'] = $usuario;

    return $mensaje;
}
