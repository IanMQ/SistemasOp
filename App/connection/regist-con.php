<?php
include("connection.php");

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if(!empty($_POST["btnsave"])){

// Recibir datos del formulario
$nombre = $_POST['nombre'];
$apellidoPaterno = $_POST['apellidoPaterno'];
$apellidoMaterno = $_POST['apellidoMaterno'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$username = $_POST['username'];
$password = $_POST['password'];
$distrito = $_POST['distrito'];
$urbanizacion = $_POST['urbanizacion'];
$nombreDireccion = $_POST['nombreDireccion'];

// Verificar si el usuario ya existe
$queryCheckUsername = "SELECT * FROM Cliente WHERE username = '$username'";
$result = $conn->query($queryCheckUsername);
if ($result->num_rows > 0) {
    // El usuario ya existe, actualizar la información del cliente
    echo '<div class="alert alert-danger">Usuario ya registrado, intente de nuevo</div>';
    header("refresh:3;url=regis.php");
} else {
    // Insertar el nuevo cliente
    // Insertar urbanización si no existe
$queryUrbanizacion = "INSERT INTO Urbanizacion (nombreUrbanizacion, idDistrito) VALUES ('$urbanizacion', '$distrito')";
$conn->query($queryUrbanizacion);
$idUrbanizacion = $conn->insert_id;

// Insertar dirección
$queryDireccion = "INSERT INTO Direccion (nombreDireccion, idUrbanizacion) VALUES ('$nombreDireccion', '$idUrbanizacion')";
$conn->query($queryDireccion);
$idDireccion = $conn->insert_id;

// Insertar cliente
$queryCliente = "INSERT INTO Cliente (nombre, apellidoPaterno, apellidoMaterno, correo, telefono, username, password, idDireccion) 
                 VALUES ('$nombre', '$apellidoPaterno', '$apellidoMaterno', '$correo', '$telefono', '$username', '$password', '$idDireccion')";
if ($conn->query($queryCliente) === TRUE) {
    echo '<div class="alert alert-success">Cliente registrado correctamente</div>';
    // Redirigir al usuario de vuelta al admin.php después de 5 segundos
    header("refresh:3;url=login.php");
} else {
    echo "<div class='alert alert-danger'>Error al registrar el cliente: " . $conn->error."</div>";
}

}



}
// Cerrar la conexión
$conn->close();
?>
