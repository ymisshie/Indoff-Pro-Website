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
    <link rel="stylesheet" href="style2.css">

    <link href="jquery.multiselect.css" rel="stylesheet" type="text/css">

    <?php
    // require functions.php file
    require('functions.php');

    require 'vendor/autoload.php';

    $info_carrito = new ameri\Carrito;

    if ($_SESSION) {
        if (isset($_SESSION['user_info'])){

            $id = $_SESSION['user_info']['nombre_login'];

            //print $id;

            $carrito = $info_carrito->mostrar();


            $cantidad_carrito = 0;

            foreach ($carrito as $item_carrito) {
                if ($item_carrito['usuarios_id'] == $id) {
                    $cantidad_carrito++;
                }
            }

            $_SESSION['cantidad_carrito'] = $cantidad_carrito;
        }
    }
    ?>

</head>

<body>

    <!--start #header-->
    <header id="header" class="color-aqua-bg">
        <div class="d-flex justify-content-between px-md-5">
            <a class="align-self-centers navbar-brand px-lg-5 fw-500 text-white font-gentiumme-auto" href="index.php">Indoff Pro</a>
            <div class="phone-info text-end me-4 ms-auto fw-600 align-self-center text-white">
                <p class="mb-0 p-1"><span><i class="me-3 fa-solid fa-phone"></i></span>(664) 625 11 11 <span><i class="ms-3 me-3 fa-solid fa-phone"></i></span>(664) 123 39 90</p>

            </div>
            <div class="align-items-center menu text-center d-flex text-white ps-md-4">
                <div class="col btn-carrito d-flex">
                    <?php if ($_SESSION) {
                        if (isset($_SESSION['user_info'])) {
                            if ($_SESSION['user_info']) {
                    ?>
                                <a href="carrito.php"><i class="fa-solid color-white fa-cart-shopping fs-1-5"></i></a>
                                <div><a href="carrito.php" class="nav-link text-white py-0 fw-500">Carrito <span class="fw-600 rounded-circle p-2 px-3 ms-2" style="background-color:#E49F49;" id="cantidadCarrito"><?php if ($_SESSION['cantidad_carrito'] > 0) {
                                                                                                                                                                                                                        print $_SESSION['cantidad_carrito'];
                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                        print '0';
                                                                                                                                                                                                                    } ?></span></a></div>
                    <?php
                            }
                        }
                    }
                    ?>
                    <?php
                    if ($_SESSION) {
                        if (isset($_SESSION['admin_info'])) {
                            if ($_SESSION['admin_info']) {
                    ?>
                                <div><i class="fas fa-file-invoice fs-1-5"></i></div>
                                <div><a href="#" class="nav-link text-white py-0 fw-500">Cotizaciones</a></div>
                    <?php
                            }
                        }
                    }
                    ?>
                </div>
                <div class="col btn-cuenta d-flex ps-4">
                    <div><i class="fas fa-user-alt fs-1-5"></i></div>
                    <div class="nav-item  <?php
                                            if ($_SESSION) {
                                                if (isset($_SESSION['user_info'])) {
                                                    if ($_SESSION['user_info']) {
                                                        echo 'dropdown';
                                                    }
                                                }
                                                if (isset($_SESSION['admin_info'])) {
                                                    if ($_SESSION['admin_info']) {
                                                        echo 'dropdown';
                                                    }
                                                }
                                            }
                                            ?>">
                        <a class="nav-link text-white py-0 fw-500 <?php
                                                                    if ($_SESSION) {
                                                                        if (isset($_SESSION['user_info'])) {
                                                                            if ($_SESSION['user_info']) {
                                                                                echo 'dropdown-toggle';
                                                                            }
                                                                        }
                                                                        if (isset($_SESSION['admin_info'])) {
                                                                            if ($_SESSION['admin_info']) {
                                                                                echo 'dropdown-toggle';
                                                                            }
                                                                        }
                                                                    }
                                                                    ?>" href="login.php" data-bs-toggle="<?php
                                                                                                            if ($_SESSION) {
                                                                                                                if (isset($_SESSION['user_info'])) {
                                                                                                                    if ($_SESSION['user_info']) {
                                                                                                                        echo 'dropdown';
                                                                                                                    }
                                                                                                                }
                                                                                                                if (isset($_SESSION['admin_info'])) {
                                                                                                                    if ($_SESSION['admin_info']) {
                                                                                                                        echo 'dropdown';
                                                                                                                    }
                                                                                                                }
                                                                                                            }
                                                                                                            ?>" aria-expanded="false">
                            <?php if ($_SESSION) {
                                if (isset($_SESSION['admin_info'])) {
                                    if ($_SESSION['admin_info']) {
                                        print 'Hola ' . $_SESSION['admin_info']['nombre_login'];
                                    }
                                }
                                if (isset($_SESSION['user_info'])) {
                                    if ($_SESSION['user_info']) {
                                        print 'Hola ' . $_SESSION['user_info']['nombre_login'];
                                    }
                                }
                                if ((!isset($_SESSION['admin_info']) && !isset($_SESSION['user_info']))) {
                                    print("Login");
                                } elseif (isset($_SESSION['user_info']) && !isset($_SESSION['admin_info'])) {
                                    if (!$_SESSION['user_info']) {
                                        print("Login");
                                    }
                                } elseif (isset($_SESSION['admin_info']) && !isset($_SESSION['user_info'])) {
                                    if (!$_SESSION['admin_info']) {
                                        print("Login");
                                    }
                                } elseif (isset($_SESSION['admin_info']) && isset($_SESSION['user_info'])) {
                                    if (!$_SESSION['admin_info'] && !$_SESSION['user_info']) {
                                        print("Login");
                                    }
                                }
                            } else {
                                print("Login");
                            }
                            ?>
                        </a>

                        <?php
                        if (isset($_SESSION['user_info'])) {
                            if ($_SESSION['user_info']) {
                        ?>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="cerrar-sesion.php">Cerrar sesión</a></li>
                                </ul>
                        <?php
                            }
                        }
                        ?>
                        <?php
                        if (isset($_SESSION['admin_info'])) {
                            if ($_SESSION['admin_info']) {
                        ?>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="panel/cerrar-sesion.php">Cerrar sesión</a></li>
                                </ul>
                        <?php
                            }
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
                            <a  class="nav-link text-white uppercase dropdown-toggle <?php if ($pagina == "categorias") {
                                                                                            echo "active";
                                                                                        } ?>" id="navbarDropdown1" role="button" aria-expanded="false" aria-haspopup="true">
                                Categorias
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
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
                            <a class="nav-link text-white dropdown-toggle uppercase<?php if ($pagina == "eventos") {
                                                                                                    echo "active";
                                                                                                } ?>" id="navbarDropdown" href="eventos.php" role="button" aria-haspopup="true"  aria-expanded="false">
                                EVENTOS
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php
                                require 'vendor/autoload.php';
                                $evento = new ameri\Evento;
                                $info_evento = $evento->mostrar();
                                $cantidad = count($info_evento);

                                if ($cantidad > 0) {
                                    for ($x = 0; $x < $cantidad; $x++) {
                                        $item = $info_evento[$x];
                                ?>
                                        <a class="dropdown-item" href="productos-eventos.php?id=<?php print $item['id'] ?>"><?php print $item['nombre'] ?></a>

                                <?php
                                    }
                                } ?>

                            </div>

                        <li class="nav-item px-md-4 uppercase">
                            <a class="nav-link text-white" aria-current="page" href="contacto.php">Contacto</a>
                        </li>
                        <li class="nav-item px-md-4 uppercase">
                            <a class="nav-link text-white" aria-current="page" href="nosotros.php">Nosotros</a>
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