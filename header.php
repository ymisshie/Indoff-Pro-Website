<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $title; ?></title>

    <!--BOOTSTRAP CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Owl-carousel CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

    <!-- font awesome icons -->
    <script src="https://kit.fontawesome.com/18bf3390f6.js" crossorigin="anonymous"></script>
    
    <!--CUSTOM CSS FILE-->
    <link rel="stylesheet" href="style2.css">

    <link href="jquery.multiselect.css" rel="stylesheet" type="text/css">

    <?php
    // require functions.php file
    require('functions.php');
    ?>

</head>

<body>

    <!--start #header-->
    <header id="header" class="color-aqua-bg">
        <div class="d-flex justify-content-between px-lg-5 pt-md-2 px-md-5">
            <a class="align-self-center navbar-brand px-lg-5 fw-500 text-white font-gentiumme-auto" href="index.php">Indoff Pro</a>
            <div class="phone-info text-end ms-auto fw-600 align-self-center text-white">
                <p class="mb-2">(664) 625 11 11</p>
                <p class="mb-1">(664) 123 39 90</p>
            </div>
            <div class="align-items-center menu text-center d-flex text-white ps-lg-5 ps-md-3">
                <div class="col btn-carrito">
    
                    <div><i class="fas fa-file-invoice fs-1-5"></i></div>
                    <div><a href="carrito.php" class="nav-link text-white px-md-3 fw-500">Cotizaciones</a></div>
    
                
                </div>
                <div class="col btn-cuenta">
                    <div><i class="fas fa-user-alt fs-1-5"></i></div>
                    <div><a href="login.php" class="nav-link text-white px-md-3 fw-500">Login</a></div>
                </div>
            </div>
        </div>

        <!--pimary navigation-->
        <nav class="navbar py-md-2 navbar-expand-lg  fw-600 px-lg-5 px-md-3">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="fas fa-bars text-white m-0"></i>
                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item px-md-4  uppercase <?php if ($pagina == "inicio") {
                                                                    echo "active";
                                                                } ?>">
                            <a class="nav-link text-white active" aria-current="page" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item px-md-4 px-md-0 dropdown">
                            <a class="nav-link text-white uppercase dropdown-toggle <?php if ($pagina == "categorias") {
                                                                                        echo "active";
                                                                                    } ?>" href="categorias.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Categorias
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php
                                    require 'vendor/autoload.php';
                                    $categoria = new ameri\Categoria;
                                    $info_categoria = $categoria->mostrar();
                                    $cantidad_categoria = count($info_categoria);

                                    if($cantidad_categoria > 0)
                                    {
                                        for($x =0; $x < $cantidad_categoria; $x++)
                                        {
                                        $item = $info_categoria[$x];
                                ?>
                                    <li><a class="dropdown-item" href="categorias.php?id=<?php print $item['id']?>"><?php print $item['nombre']?></a></li>
                                        
                                <?php
                                        }
                                    }
                                ?>
                            </ul>
                        </li>
                        <li class="nav-item dropdown px-md-4">
                            <a class="nav-link text-white text-white dropdown-toggle uppercase" href="panel/eventos/index.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Eventos
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php
                                    require 'vendor/autoload.php';
                                    $evento = new ameri\Evento;
                                    $info_evento = $evento->mostrar();
                                    $cantidad = count($info_evento);

                                    if($cantidad > 0)
                                    {
                                        for($x =0; $x < $cantidad; $x++)
                                        {
                                        $item = $info_evento[$x];
                                ?>
                                    <li><a class="dropdown-item" href="eventos.php?id=<?php print $item['id']?>"><?php print $item['nombre']?></a></li>
                                        
                                <?php
                                        }
                                    }
                                ?>
                            </ul>
                        </li>
                        <li class="nav-item px-md-4 uppercase">
                            <a class="nav-link text-white" aria-current="page" href="#">Contacto</a>
                        </li>
                        <li class="nav-item px-md-4 uppercase">
                            <a class="nav-link text-white" aria-current="page" href="#">Nosotros</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--!pimary navigation-->

    </header>
    <!--!start #header-->

    <!--start #main-site-->
    <main id="main-site">