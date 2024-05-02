<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

if (!empty($_GET["id"])) {
    $id = $_GET["id"];

    $sql = $conn->query("DELETE FROM cliente WHERE idCliente = $id");
    if ($sql === true) {

        echo '<div class="alert alert-success">Cliente eliminado correctamente</div>';

    } else {
        echo '<div class="alert alert-danger">Error al eliminar</div>';
    }
}
?>