<?php
include("../connection/connection.php");
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$id = $_GET["id"];
$sql_getC = $conn->query("SELECT * FROM cliente WHERE idCliente = $id");
if ($sql_getC->num_rows > 0) {
    $Cliente = $sql_getC->fetch_object();
    
    // Obtener dirección
    $idDireccion = $Cliente->idDireccion;
    $queryDireccion = $conn->query("SELECT * FROM direccion WHERE idDireccion = $idDireccion");
    if ($queryDireccion->num_rows > 0) {
        $Direccion = $queryDireccion->fetch_object();
        
        // Obtener Urbanizacion
        $idUrbanizacion = $Direccion->idUrbanizacion;
        $queryUrbanizacion = $conn->query("SELECT * FROM urbanizacion WHERE idUrbanizacion = $idUrbanizacion");
        if ($queryUrbanizacion->num_rows > 0) {
            $Urbanizacion = $queryUrbanizacion->fetch_object();
            
            // Obtener Distrito
            $idDistrito = $Urbanizacion->idDistrito;
            $queryDistrito = $conn->query("SELECT * FROM distrito WHERE idDistrito = $idDistrito");
            if ($queryDistrito->num_rows > 0) {
                $Distrito = $queryDistrito->fetch_object();
                
                // Aquí puedes hacer lo que necesites con los objetos Cliente, Dirección, Urbanización y Distrito
                // Por ejemplo, puedes imprimir sus datos o utilizarlos de alguna otra manera
                
            } else {
                echo "No se encontró el distrito";
            }
        } else {
            echo "No se encontró la urbanización";
        }
    } else {
        echo "No se encontró la dirección";
    }
} else {
    echo "No se encontró el cliente";
}

$conn->close();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Editing Page</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.php">
    
</head>
<body>
<div class="container">
<?php include "../connection/distrit-con.php"; ?>
    <div class="row col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">
                <h1>Edición de Cliente</h1>
            </div>   

            <div class="panel-body">
                <form method="post">                        
                <?php include "save-edit-client.php"; ?>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $Cliente->nombre ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="apellidoPaterno">Apellido Paterno</label>
                        <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno" value="<?= $Cliente->apellidoPaterno ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="apellidoMaterno">Apellido Materno</label>
                        <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno" value="<?= $Cliente->apellidoMaterno ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo Electrónico</label>
                        <input type="email" class="form-control" id="correo" name="correo" value="<?= $Cliente->correo ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono" value="<?= $Cliente->telefono ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="username">Nombre de Usuario</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= $Cliente->username ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?= $Cliente->password ?>"/>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="idDireccion">Dirección</label><br><br>
                            
                        <div class="form-group">
                            <label for="distrito">Distrito</label>
                            <select class="form-control" id="distrito" name="distrito" >
                                <?php
                                // Generar las opciones del menú desplegable basadas en los datos de la base de datos
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                         // Verificar si el idDistrito coincide con el idDistrito del distrito almacenado
                                        $selected = ($Distrito->idDistrito == $row["idDistrito"]) ? "selected" : "";
                                        // Agregar la opción con el atributo selected si corresponde al distrito almacenado
                                        echo '<option value="' . $row["idDistrito"] . '" ' . $selected . '>' . $row["nombreDistrito"] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                        <label for="urbanizacion">Urbanización</label>
                        <input type="text" class="form-control" id="urbanizacion" name="urbanizacion" value="<?= $Urbanizacion->nombreUrbanizacion ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="nombreDireccion">Nombre de la dirección</label>
                            <input type="text" class="form-control" id="nombreDireccion" name="nombreDireccion" value="<?= $Direccion->nombreDireccion ?>"/>
                        </div>                        
                    </div>
                                      

                    
                    <button type="submit" class="btn btn-primary" name="btnsave"  value="ok">Modificar Cliente</button>
                </form>
            </div>

            <div class="panel-footer text-left">                        
                        <a href="../admin.php" class="text-decoration-none">Volver</a>
                    </div>
            <div class="panel-footer text-right">
                &copy; LuxeFormal 
            </div>
            
        </div>
    </div>
</div>
</body>
</html>