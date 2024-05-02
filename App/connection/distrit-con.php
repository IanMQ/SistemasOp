<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "test";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener los distritos desde la base de datos
$sql = "SELECT idDistrito, nombreDistrito FROM Distrito";
$result = $conn->query($sql);
?>