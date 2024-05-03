<?php
include("connection.php");

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