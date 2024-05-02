

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.php">
</head>
<body>
<div class="container">
<?php include "connection/distrit-con.php";  ?>

    <div class="row col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">
                <h1>Registration Form</h1>
            </div>
            <div class="panel-body">
                <form method="post" >
                <?php include "connection/regist-con.php";  ?>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre"/>
                    </div>
                    <div class="form-group">
                        <label for="apellidoPaterno">Apellido Paterno</label>
                        <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno"/>
                    </div>
                    <div class="form-group">
                        <label for="apellidoMaterno">Apellido Materno</label>
                        <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno"/>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo Electrónico</label>
                        <input type="email" class="form-control" id="correo" name="correo"/>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono"/>
                    </div>
                    <div class="form-group">
                        <label for="username">Nombre de Usuario</label>
                        <input type="text" class="form-control" id="username" name="username"/>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password"/>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="idDireccion">Dirección</label><br><br>
                            
                        <div class="form-group">
                            <label for="distrito">Distrito</label>
                            <select class="form-control" id="distrito" name="distrito">
                                <?php
                                // Generar las opciones del menú desplegable basadas en los datos de la base de datos
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row["idDistrito"] . '">' . $row["nombreDistrito"] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                        <label for="urbanizacion">Urbanización</label>
                        <input type="text" class="form-control" id="urbanizacion" name="urbanizacion"/>
                        </div>
                        <div class="form-group">
                            <label for="nombreDireccion">Nombre de la dirección</label>
                            <input type="text" class="form-control" id="nombreDireccion" name="nombreDireccion"/>
                        </div>                        
                    </div>
                    <button type="submit" class="btn btn-primary" name="btnsave"  value="ok">Enviar</button>
                </form>
            </div>
            <div class="panel-footer text-left">                        
                        <a href="login.php" class="text-decoration-none">Volver</a>
                    </div>
            <div class="panel-footer text-right">
                &copy; LuxeFormal 
            </div>
            
        </div>
    </div>
</div>
</body>
</html>