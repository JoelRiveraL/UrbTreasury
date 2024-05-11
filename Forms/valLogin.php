<?php
session_start();

require_once('../Forms/conexionMySql.php');

$user = $_POST["usuario"];
$password = $_POST["password"];

$nombreTabla = 'usuario';

$sql = "SELECT * FROM $nombreTabla WHERE usuarioU = ? AND passwordU = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $user, $password);
$stmt->execute();
$result = $stmt->get_result();
$userData = $result->fetch_assoc();

if ($userData) {
    $autenticado = true;

    if ($user == "Patricia123") {
        header('Location: ../Principal/homeAdmin.php');
        exit();
    } else {
        header('Location: ../Principal/resident.php?user=' . $user);
        exit();
    }
} else {
    header('Location: ../index.html?error=true');
    exit();
}
