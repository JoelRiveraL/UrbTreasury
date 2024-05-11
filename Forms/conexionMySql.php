<?php
/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "urbanizationtreasurysystem";


$servername = "www.drs.ec:2083";
$username = "datareco_joelDome";
$password = "W.%[H}bCLCK-";
$dbname = "datareco_urbTreasury";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}*/


$servername = "localhost";
$username = "datareco_joelDome";
$password = "W.%[H}bCLCK-";
$dbname = "datareco_urbTreasury";

$conn = new mysqli($servername, $username, $password, $dbname, 3306);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
