<?php
include("../connection/connection.php");
$conn->set_charset("utf8");

if (!empty($_GET["id"])) {
    $idCliente = $_GET["id"];
}
?>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    

    <!-- Customized Bootstrap Stylesheet -->    
    <link rel="stylesheet" type="text/css" href="../css/index.php">
</head>

<body>
<img src="https://i.pinimg.com/originals/9e/a4/16/9ea416a2c4936e4b00cf6a7cd871aa82.gif" alt="GIF de Fondo" id="gif-background">
    <!-- Topbar Start -->
    <div class="container-fluid">
    <div class="row align-items-center py-3 px-xl-5 toast-header">
        <div class="col-lg-8 col-md-10 col-12">
            <a href="" class="text-decoration-none">
                <h1 class="m-0 display-5 font-weight-semi-bold text-light"><span class="text-primary font-weight-bold border px-3 mr-1">Luxe</span>Formal</h1>
            </a>
        </div>

        <div class="col-lg-4 col-md-2 col-12 text-right">
            <a href="" class="btn border">
                <i class="fas fa-shopping-cart text-primary"></i>
                <span class="badge">0</span>
            </a>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0 ">
        <a href="" class="text-decoration-none d-block d-lg-none">
            <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
                <a href="../index.php?id=<?php echo $idCliente; ?>" class="nav-item nav-link active">Inicio</a>                
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Comprar</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="Pages/sec-men.php?id=<?php echo $idCliente; ?>&men" class="dropdown-item">Sección Hombres</a>
                        <a href="Pages/sec-women.php?id=<?php echo $idCliente; ?>&women" class="dropdown-item">Sección Mujer</a>
                        <a href="Pages/sec-bb.php?id=<?php echo $idCliente; ?>&bb" class="dropdown-item">Sección Bebés</a>
                        <a href="Pages/sec-acces.php?id=<?php echo $idCliente; ?>&acces" class="dropdown-item">Accesorios</a>
                        <a href="Pages/sec-bags.php?id=<?php echo $idCliente; ?>&bags" class="dropdown-item">Bolsos</a>
                        <a href="Pages/sec-shoes.php?id=<?php echo $idCliente; ?>&shoes" class="dropdown-item">Calzado</a>
                    </div>
                </div>                
            </div>
            <div class="navbar-nav ml-auto py-0">
                <a href="login.php" class="nav-item nav-link">Cerrar Sesión</a>                            
            </div>
        </div>
    </nav>
</div>
    <!-- Topbar End -->
    



    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
        <?php
include("../connection/connection.php");

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener los productos
$sql = "SELECT descripcion, color, talla,imagen, idProducto,precioUnit FROM Producto WHERE idCategoria=1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar productos
    while($row = $result->fetch_assoc()) {
        echo '<div class="col-lg-4 col-md-6 pb-1">';
        echo '<div class="cat-item d-flex flex-column border mb-4 toast-header" style="padding: 30px;">';                    
        echo '<a href="#" class="cat-img position-relative overflow-hidden mb-3" data-toggle="modal" data-target="#modal-'.$row["idProducto"].'">';
        // Verificar si la URL de la imagen está vacía o devuelve un error
        if (!empty($row["imagen"]) && @getimagesize($row["imagen"])) {
            // Si la URL de la imagen no está vacía y se puede cargar correctamente, mostrar la imagen del producto
            echo '<img class="img-fluid" src="' . $row["imagen"] . '" alt="">';
        } else {
            // Si la URL de la imagen está vacía o no se puede cargar, mostrar la imagen de carga
            echo '<img class="img-fluid" src="https://static.vecteezy.com/system/resources/thumbnails/001/826/199/small_2x/progress-loading-bar-buffering-download-upload-and-loading-icon-vector.jpg" alt="Loading...">';
        }
        // Obtener info de la tabla inventario
        $idProducto=$row["idProducto"];
        $sqlquery = "SELECT idInventario , cantidad  FROM inventario WHERE idProducto='$idProducto'";
        $resultquery = $conn->query($sqlquery);
        $row2 = $resultquery->fetch_assoc();

        echo '</a>';
        // Mostrar detalles del producto
        echo '<h5 class="font-weight-semi-bold m-0">' . $row["descripcion"] . '</h5>';
        echo '<p>Color: ' . $row["color"] . '</p>';
        echo '<p>Talla: ' . $row["talla"] . '</p>';        
        echo '<p>Cantidad: <input type="number" id="cantidad-' . $row["idProducto"] . '" value="1" min="1" max="' . $row2["cantidad"] . '" onchange="actualizarPrecioTotal(' . $row["idProducto"] . ', ' . $row["precioUnit"] . ')"></p>';
        echo '<p>Precio Total: <span id="precio-total-' . $row["idProducto"] . '">S/.' . $row["precioUnit"] . '</span></p>';
        echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-'.$row["idProducto"].'" onclick="">Comprar</button>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "0 resultados";
}

// Cerrar conexión
$conn->close();
?>

<script>            
    // Función para calcular y actualizar el precio total
    function actualizarPrecioTotal(idProducto, precioUnitario) {
        // Obtener el valor de la cantidad
        var cantidad = document.getElementById('cantidad-' + idProducto).value;
        // Calcular el precio total
        var precioTotal = cantidad * precioUnitario;
        // Actualizar el texto del precio total
        document.getElementById('precio-total-' + idProducto).textContent = 'S/.' + precioTotal.toFixed(2);
    }

    // Asignar el evento onchange a cada campo de cantidad
    <?php
    $result->data_seek(0); // Reiniciar el puntero del resultado a la primera fila
    while ($row = $result->fetch_assoc()) {
        echo 'document.getElementById("cantidad-' . $row["idProducto"] . '").onchange = function() { actualizarPrecioTotal(' . $row["idProducto"] . ', ' . $row["precioUnit"] . '); };';
    }
    ?>
</script>
         

        </div>
    </div>
    <!-- Categories End -->
   
    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-8 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border  px-3 mr-1">Luxe</span>Formal</h1>
                </a>
                <p>Nos comprometemos a ofrecer una selección cuidadosamente curada de prendas y accesorios que capturan la esencia de la sofisticación y la elegancia atemporal.</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Calle 123, Lima, Peru</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>

            <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Boletin</h5>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control border-0 py-4" placeholder="Nombre" required="required">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 py-4" placeholder="Correo" required="required">
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block border-0 py-3" type="submit">Subscribete ahora</button>
                            </div>
                        </form>
                    </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    © <a class="text-dark font-weight-semi-bold" href="#">LuxeFormal</a>. Todos los derechos reservados. 
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="https://ianmq.github.io/Assets/SistOp/imgMarcas/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top" style="display: inline;"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
     

   


</body></html>