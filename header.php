<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--FAVICON-->
    <link rel="icon" type="image/png" href="assets/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="assets/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="assets/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="assets/android-chrome-512x512.png" sizes="512x512">
    <link rel="apple-touch-icon" href="assets/apple-touch-icon.png">
    <link rel="shortcut icon" type="image/jpg" href="assets/favicon.ico" />

    <title><?php echo $title; ?></title>

    <!--BOOTSTRAP CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- font awesome icons -->
    <script src="https://kit.fontawesome.com/18bf3390f6.js" crossorigin="anonymous"></script>

    <!--CUSTOM CSS FILE-->
    <?php echo $root_styles;
    require($root_vendor);
    require($root_functions);

    $info_carrito = new ameri\Carrito;

    $user_existe = 0;
    $admin_existe = 0;


    if ($_SESSION) {
        if ((isset($_SESSION['user_info']))) {
            $user_existe++;
            if ($_SESSION['user_info']) {
                $user_existe++;
            }
        }

        if ((isset($_SESSION['admin_info']))) {
            $admin_existe++;
            if ($_SESSION['admin_info']) {
                $admin_existe++;
            }
        }

        if ($user_existe > 1) {
            $id = $_SESSION['user_info']['nombre_login'];
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

    <script src="<?php print $root_script; ?>"></script>
    <!--Captcha-->

    <script src="https://www.google.com/recaptcha/api.js" async="" defer=""></script>

</head>

<body>

    <header id="header" class="text-white bg-darkblue">
        <nav class="navbar navbar-expand-md px-5 py-4">
            <div class="container-fluid">
                <a href="<?php print $root_index; ?>">
                    <h5 class="logo text-white fw-600 mb-0">Indoff Pro</h5>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars text-white"></i>
                </button>

                <div class="col-md-5 collapse navbar-collapse" id="navbarNavDropdown">
                    <!--NAVBAR-->
                    <ul class="navbar-nav my-3 my-md-0 mx-auto">

                        <li class="mt-md-0 nav-item pe-md-3">
                            <a class="px-3 px-md-3 nav-link <?php if ($pagina == "index") {
                                                                echo "active";
                                                            } ?>" aria-current="page" href="<?php print $root_index; ?>">Inicio</a>
                        </li>

                        <li class="nav-item dropdown pe-md-3">
                            <a class="px-md-3 nav-link dropdown-toggle <?php if ($pagina == "categorias") {
                                                                            echo "active";
                                                                        } ?>" href="<?php print $root_categorias . '?id=1' ?>" id="navbarDropdown1" role="button" aria-expanded="false" aria-haspopup="true">
                                Categorias
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                <?php
                                $categoria = new ameri\Categoria;
                                $kit = new ameri\Kits;

                                $info_categoria = $categoria->mostrarOrden();
                                $info_kit = $kit->mostrar();

                                $cantidad_categoria = count($info_categoria);

                                if ($cantidad_categoria > 0) {
                                    for ($x = 0; $x < $cantidad_categoria; $x++) {
                                        $item = $info_categoria[$x];
                                ?>
                                        <li><a class="dropdown-item py-md-2" href="<?php print $root_categorias . '?id=' . $item['id'] ?>"><?php print $item['nombre'] ?></a></li>

                                <?php
                                    }
                                }
                                ?>

                                <li><a class="dropdown-item py-md-2" href="<?php print $root_categorias . '?id=6' ?>"><?php print $info_kit[0]['nombre']; ?></a></li>

                            </ul>

                        </li>

                        <li class="nav-item dropdown pe-md-3">
                            <a class="px-3 px-md-3 nav-link dropdown-toggle <?php if ($pagina == "eventos") {
                                                                                echo "active";
                                                                            } ?>" id="navbarDropdown" href="<?php print $root_eventos; ?>" role="button" aria-haspopup="true" aria-expanded="false">
                                Eventos
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php
                                $evento = new ameri\Evento;
                                $info_evento = $evento->mostrarOrden6();
                                $cantidad = count($info_evento);

                                if ($cantidad > 0) {
                                    for ($x = 0; $x < $cantidad; $x++) {
                                        $item = $info_evento[$x];
                                ?>
                                        <a class="dropdown-item py-md-2" href="<?php print $root_productos_eventos . '?id=' . $item['id'] ?>"><?php print $item['nombre'] ?></a>

                                <?php
                                    }
                                } ?>

                            </div>
                        </li>

                        <li class="nav-item pe-md-3">
                            <a class="px-3 px-md-3 nav-link <?php if ($pagina == "contacto") {
                                                                echo "active";
                                                            } ?>" aria-current="page" href="<?php print $root_contacto; ?>">Contacto</a>
                        </li>

                        <li class="nav-item pe-md-3">
                            <a class="px-3 px-md-3 nav-link <?php if ($pagina == "nosotros") {
                                                                echo "active";
                                                            } ?>" aria-current="page" href="<?php print $root_nosotros; ?>">Nosotros</a>
                        </li>
                    </ul>

                </div>

                <!--MENU CUENTA-->

                <?php
                //USUARIO
                if ($user_existe > 1) {
                ?>
                    <div class="col-md-5 justify-content-between d-flex">

                        <a href="<?php print $root_carrito; ?>">
                            <div class="nav-item col btn-carrito d-flex align-items-center text-white">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <p class="nav-link m-0 text-white">Carrito<span class="ms-3 p-2 rounded-circle color-aqua-bg" id="cantidadCarrito"><?php if ($_SESSION['cantidad_carrito']) {
                                                                                                                                                        print $_SESSION['cantidad_carrito'];
                                                                                                                                                    } elseif ($_SESSION['cantidad_carrito'] == 0)
                                                                                                                                                        print '0';
                                                                                                                                                    ?></span></p>
                            </div>
                        </a>

                        <a href="<?php print $root_cotizaciones; ?>">
                            <div class="col btn-cotizaciones d-flex align-items-center py-0 text-white">
                                <i class="fas fa-file-invoice"></i>
                                <p class="nav-link m-0 text-white">Cotizaciones</p>
                            </div>
                        </a>

                        <div class="d-flex">
                            <i class="fas fa-user text-white align-self-center"></i>
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php print $_SESSION['user_info']['nombre_usuario'] . ' ' . $_SESSION['user_info']['apellido_usuario']; ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item py-2" href="<?php print $root_logout; ?>"><span><i class="me-2 fas fa-sign-out-alt align-self-center"></i></span>Cerrar sesión</a></li>
                                </ul>
                            </div>
                        </div>



                    </div>
                <?php
                }
                //ADMIN
                elseif ($admin_existe > 1) {
                ?>
                    <div class="col-md-4 ms-auto d-flex justify-content-between">

                        <a href="<?php print $root_dashboard; ?>">

                            <p class="nav-link m-0 text-white p-2"> <i class="fas fa-columns text-white me-3"></i>Admin Dashboard</p>

                        </a>

                        <div class="d-flex">

                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white p-2" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span> <i class="fas fa-user text-white align-self-center me-3"></i></span> <?php print $_SESSION['admin_info']['admin_user']; ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item py-2" href="<?php print $root_logout; ?>"><span><i class="me-2 fas fa-sign-out-alt align-self-center"></i></span>Cerrar sesión</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                <?php
                }
                //SIN SESION
                else {
                ?>
                    <div class="col-7 col-sm-4 col-lg-2 justify-content-evenly text-end ms-auto nav-item col d-flex align-items-center">

                        <a href="<?php print $root_login; ?>" class="btn-cuenta nav-link text-white m-0 fw-600 p-2"><span><i class="fa-solid fa-user me-3"></i></span>Log In</a>
                        <a href="<?php print $root_register; ?>" class="btn-cuenta nav-link text-white m-0 fw-600 p-2" id="nav-link-signup">Registrarse</a>

                    </div>
                <?php
                }
                ?>

            </div>
        </nav>
    </header>

    <main id="main-site">