<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener los clientes
$sql = "SELECT * FROM cliente";
$result = $conn->query($sql);

// Cerrar conexión
$conn->close();

// Retornar resultados como JSON
echo json_encode($result->fetch_all(MYSQLI_ASSOC));
?>