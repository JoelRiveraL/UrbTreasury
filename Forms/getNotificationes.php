<?php
include 'conexionMySql.php';

$db = Database::getInstance();
$conn = $db->getConnection();
$fecha_hoy = date("Y-m-d");
$sql = "SELECT usuarioResC, nombreResC FROM comentarios WHERE fechaC = '$fecha_hoy' ORDER BY fechaC DESC LIMIT 4";
$result = $conn->query($sql);

$notificaciones = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $notificaciones[] = [
            'usuario' => $row["usuarioResC"],
            'nombre' => $row["nombreResC"]
        ];
    }
}

echo json_encode($notificaciones);
$conn->close();
