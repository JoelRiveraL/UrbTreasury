<?php
session_start();
// Verificar si se ha pasado un ID válido en la URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
}

$_SESSION['idSoporte'] = $id;

header("Location: ../Principal/soporte.php");
