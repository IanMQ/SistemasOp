<?php
include("connection.php");

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener los distritos desde la base de datos
$sql = "SELECT idDistrito, nombreDistrito FROM Distrito";
$result = $conn->query($sql);
?>