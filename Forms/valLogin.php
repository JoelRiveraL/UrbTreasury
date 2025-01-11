<?php
session_start();

require_once '../Models/Usuario.php';

$user = $_POST["usuario"];
$password = $_POST["password"];

$usuarioObj = new Usuario($user, $password);
$userData = $usuarioObj->login();

if ($userData) {
    $_SESSION['autenticado'] = true;

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