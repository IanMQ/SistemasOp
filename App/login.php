<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Acceso</title>        
    <link rel="stylesheet" type="text/css" href="css/login.php">
    </style>
</head>
<body>
<div id="contenedor">
<img src="https://mbluxury1.s3.amazonaws.com/2024/02/26142401/Words-Associated-With-Luxury-Brands-Hermes-gif.gif" alt="GIF de Fondo" id="gif-background">
            <div id="central">
                <div id="login">
                    <div class="titulo">
                        LuxeFormal
                    </div>
                    <form id="loginform" action="connection/login-con.php" method="post">
                        <input type="text" name="usuario" placeholder="Usuario" required="">
                        
                        <input type="password" placeholder="Contraseña" name="password" required="">
                        
                        <button type="submit" title="Ingresar" name="Ingresar">Login</button>
                    </form>
                    <div class="pie-form">
                        <a href="regis.php">¿No tienes Cuenta? Registrate</a>
                        <a href="admin.php">ADMIN - MODE</a>
                    </div>
                </div>
            </div>
        </div>
    
</body>
</html>
