<?php
if(!empty($_POST["btnsave"])){
    // Validar que todos los campos necesarios estén presentes
    if(!empty($_POST["nombre"]) &&
       !empty($_POST["apellidoPaterno"]) &&
       !empty($_POST["apellidoMaterno"]) &&
       !empty($_POST["correo"]) &&
       !empty($_POST["telefono"]) &&
       !empty($_POST["username"]) &&
       !empty($_POST["password"]) &&
       !empty($_POST["distrito"]) &&
       !empty($_POST["urbanizacion"]) &&
       !empty($_POST["nombreDireccion"])) {

        // Obtener los valores de los campos del formulario
        $nombre = $_POST["nombre"];
        $apellidoPaterno = $_POST["apellidoPaterno"];
        $apellidoMaterno = $_POST["apellidoMaterno"];
        $correo = $_POST["correo"];
        $telefono = $_POST["telefono"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $distrito = $_POST["distrito"];
        $urbanizacion = $_POST["urbanizacion"];
        $nombreDireccion = $_POST["nombreDireccion"];
   
        // Obtener id direccion actual
        $idDirResult = $conn->query("SELECT idDireccion FROM cliente WHERE idCliente='$id'");  
        $idDirRow = $idDirResult->fetch_assoc();
        $idDir = $idDirRow['idDireccion'];

        // Obtener id urbanizacion actual
        $idUrbResult = $conn->query("SELECT idUrbanizacion FROM direccion WHERE idDireccion='$idDir'");        
        $idUrbRow = $idUrbResult->fetch_assoc();
        $idUrb = $idUrbRow['idUrbanizacion'];        
        
        //Modificando Urbanizacion
        $updtUrb = $conn->query("UPDATE urbanizacion set nombreUrbanizacion='$urbanizacion', idDistrito='$distrito' WHERE idUrbanizacion='$idUrb'");
        
        //Modificando Direccion
        $updtDir = $conn->query("UPDATE direccion set nombreDireccion='$nombreDireccion' WHERE idDireccion='$idDir'");      

        //Modificando Cliente
        $updtClient = $conn->query("UPDATE cliente set nombre='$nombre', apellidoPaterno='$apellidoPaterno', apellidoMaterno='$apellidoMaterno', correo='$correo', telefono='$telefono', username='$username', password='$password' WHERE idCliente='$id'");

        // Mostrar mensaje de éxito si la actualización fue exitosa
        echo '<div class="alert alert-success">Cliente modificado correctamente</div>';
    // Redirigir al usuario de vuelta al admin.php después de 5 segundos
    header("refresh:5;url=../admin.php");
    } else {
        // Mostrar mensaje de error si faltan campos
        echo '<div class="alert alert-danger">Campos vacíos</div>';
    }
}
?>