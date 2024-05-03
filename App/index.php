<?php
include("connection/connection.php");
$conn->set_charset("utf8");

if (!empty($_GET["id"])) {
    $idCliente = $_GET["id"];
}
?>

<html lang="en"><head>
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

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->    
    <link rel="stylesheet" type="text/css" href="css/index.php">
</head>

<body>
<img src="https://25.media.tumblr.com/0d342dbe99dd698a82baf8d168ce1790/tumblr_mkbhagMANA1rwmh9jo1_500.gif" alt="GIF de Fondo" id="gif-background">
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
                <a href="index.php?id=<?php echo $idCliente; ?>" class="nav-item nav-link active">Inicio</a>                
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
    

    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5 justify-content-center">
        
            <div class="col-lg-9">
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="https://d1fufvy4xao6k9.cloudfront.net/images/blog/posts/2024/04/hockerty_photo_of_4_female_layers_in_blue_suits_of_which_1_bl_ddb76d2c-111f-4b74-b6cd-b8fa4f169f9b_2.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Dsct en tu Primera Compra</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Vestidos de Moda</h3>
                                    <a href="" class="btn btn-light py-2 px-3">¡Compra Ahora!</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="https://www.fashionbeans.com/wp-content/uploads/2018/09/formal-attire-top-2.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Dsct en tu Primera Compra</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Precios Razonables</h3>
                                    <a href="" class="btn btn-light py-2 px-3">¡Compra Ahora!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4 toast-header" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Productos de Calidad</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4 toast-header" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Envio Gratis</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4 toast-header" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Dias de Retorno</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1 ">
                <div class="d-flex align-items-center border mb-4 toast-header" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Soporte 24/7</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-4 col-md-6 pb-1 ">
                <div class="cat-item d-flex flex-column border mb-4 toast-header" style="padding: 30px;">
                    <p class="text-right">5 Products</p>
                    <a href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="https://www.thefashionisto.com/wp-content/uploads/2023/10/Semi-formal-Attire-Men-Personal-Style.jpg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Sección Hombres</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4 toast-header" style="padding: 30px;">
                    <p class="text-right">5 Products</p>
                    <a href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="https://i.etsystatic.com/45491344/r/il/1e262f/5345013227/il_fullxfull.5345013227_qe5j.jpg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Sección Mujeres</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4 toast-header" style="padding: 30px;">
                    <p class="text-right">5 Products</p>
                    <a href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="https://m.media-amazon.com/images/I/31ZsXSl7UXL._SS400_.jpg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Sección Bebés</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4 toast-header" style="padding: 30px;">
                    <p class="text-right">5 Products</p>
                    <a href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="https://m.media-amazon.com/images/I/71E3tzct-CL._AC_UY1000_.jpg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Accesorios</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4 toast-header" style="padding: 30px;">
                    <p class="text-right">5 Products</p>
                    <a href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="https://i.pinimg.com/736x/3b/9b/17/3b9b1752dd6a710b33461bc8fbd1c378.jpg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Bolsos</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4 toast-header" style="padding: 30px;">
                    <p class="text-right">5 Products</p>
                    <a href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="https://img0.junaroad.com/uiproducts/19956233/zoom_0-1686219425.jpg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Calzado</h5>
                </div>
            </div>
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