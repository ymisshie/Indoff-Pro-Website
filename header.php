<?php
session_start();

?>

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
    <link rel="stylesheet" href="style.css">

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
                <p class="mb-2  p-1"><span><i class="me-3 fa-solid fa-phone"></i></span>(664) 625 11 11</p>
                <p class="mb-2  p-1"><span><i class="me-3 fa-solid fa-phone"></i></span>(664) 123 39 90</p>
            </div>
            <div class="align-items-center menu text-center d-flex text-white ps-lg-5 ps-md-3">
                <div class="col btn-carrito">
                    <?php if ($_SESSION['user_info']) {
                    ?>
                        <div><i class="fa-solid fa-cart-shopping fs-1-5"></i></i></div>
                        <div><a href="carrito.php" class="nav-link text-white px-md-3 fw-500">Carrito</a></div>
                    <?php
                    }
                    ?>
                </div>
                <div class="col btn-carrito">
                    <?php if ($_SESSION['admin_info']) {
                    ?>
                        <div><i class="fas fa-file-invoice fs-1-5"></i></div>
                        <div><a href="#" class="nav-link text-white px-md-3 fw-500">Cotizaciones</a></div>
                    <?php
                    }
                    ?>
                </div>
                <div class="col btn-cuenta">
                    <div><i class="fas fa-user-alt fs-1-5"></i></div>
                    <div class="nav-item  <?php if ($_SESSION['user_info'] || $_SESSION['admin_info']) echo "dropdown"  ?>">
                        <a class="nav-link text-white px-lg-3 fw-500 <?php if ($_SESSION['user_info'] || $_SESSION['admin_info']) echo "dropdown-toggle" ?>" href="login.php" data-bs-toggle="<?php if ($_SESSION['user_info'] || $_SESSION['admin_info']) echo "dropdown" ?>" aria-expanded="false">
                            <?php if (!$_SESSION['user_info'] && !$_SESSION['admin_info']) {
                                print("Login");
                            } elseif ($_SESSION['admin_info']) {
                                print $_SESSION['admin_info']['nombre_login'];
                            } else {
                                print $_SESSION['user_info']['nombre_login'];
                            }
                            ?>
                        </a>

                        <?php
                        if ($_SESSION['user_info']) {
                        ?>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="cerrar-sesion.php">Cerrar sesión</a></li>
                            </ul>
                        <?php
                        }
                        ?>
                        <?php
                        if ($_SESSION['admin_info']) {
                        ?>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="panel/cerrar-sesion.php">Cerrar sesión</a></li>
                                <li><a class="dropdown-item" href="panel/dashboard.php">Ir a Dashboard</a></li>
                            </ul>
                        <?php
                        }
                        ?>
                        <!-- <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="cerrar-sesion.php">Cerrar sesión</a></li>
                                    </ul> -->
                    </div>
                </div>
            </div>
        </div>

        <!--pimary navigation-->
        <nav class="navbar py-md-1 navbar-expand-lg fw-600 px-lg-5 px-md-3">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="fas fa-bars text-white m-0"></i>
                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item px-md-4 uppercase">
                            <a class="nav-link text-white  <?php if ($pagina == "inicio") {
                                                                echo "active";
                                                            } ?>" aria-current="page" href="index.php"><span><i class="fa-solid fa-house me-3"></i></span> Inicio</a>
                        </li>
                        <li class="nav-item px-md-4 px-md-0 dropdown">
                            <a class="nav-link text-white uppercase dropdown-toggle  <?php if ($pagina == "categorias") {
                                                                                            echo "active";
                                                                                        } ?>" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Categorias
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php
                                require 'vendor/autoload.php';
                                $categoria = new ameri\Categoria;
                                $info_categoria = $categoria->mostrar();
                                $cantidad_categoria = count($info_categoria);

                                if ($cantidad_categoria > 0) {
                                    for ($x = 0; $x < $cantidad_categoria; $x++) {
                                        $item = $info_categoria[$x];
                                ?>
                                        <li><a class="dropdown-item" href="categorias.php?id=<?php print $item['id'] ?>"><?php print $item['nombre'] ?></a></li>

                                <?php
                                    }
                                }
                                ?>
                            </ul>

                        </li>
                        <li class="nav-item dropdown px-md-4">
                            <a class="nav-link text-white text-white dropdown-toggle uppercase <?php if ($pagina == "eventos") {
                                                                                                    echo "active";
                                                                                                } ?>" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Eventos
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php
                                require 'vendor/autoload.php';
                                $evento = new ameri\Evento;
                                $info_evento = $evento->mostrar();
                                $cantidad = count($info_evento);

                                if ($cantidad > 0) {
                                    for ($x = 0; $x < $cantidad; $x++) {
                                        $item = $info_evento[$x];
                                ?>
                                        <li><a class="dropdown-item" href="productos-eventos.php?id=<?php print $item['id'] ?>"><?php print $item['nombre'] ?></a></li>

                                <?php
                                    }
                                } ?>

                            </ul>

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