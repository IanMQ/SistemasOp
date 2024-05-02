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

// Obtener los datos del formulario
$usuario = $_POST['usuario'];
$password = $_POST['password'];

// Consulta SQL para verificar las credenciales del usuario
$sql = "SELECT * FROM Cliente WHERE username = '$usuario' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Cliente loggeado correctamente
    // Redirigir al archivo index.php en la carpeta anterior
    header("Location: ../index.php");
    exit(); // Asegurarse de que el script se detenga después de la redirección
} else {
    header("Location: ../login.php");
}

$conn->close();
?>