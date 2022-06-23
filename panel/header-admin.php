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

    <!--Captcha-->
    <script src="https://www.google.com/recaptcha/api.js" async="" defer=""></script>

</head>

<body>
    <header id="header" class="bg-darkblue">

        <nav class="navbar navbar-expand-md px-5 py-4">
            <div class="container-fluid">

                <a href="<?php print $root_dashboard; ?>">
                    <h5 class="logo text-white fw-600 mb-0 pe-5 me-3">Indoff Pro Dashboard</h5>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars text-white"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">

                    <ul class="navbar-nav my-3 my-md-0 me-auto">

                        <li class="nav-item dropdown pe-md-4">
                            <a class="nav-link dropdown-toggle  <?php if ($page_name == "categorias") {
                                                                    echo "active";
                                                                } ?>" href="<?php print $root_categorias; ?>" id="navbarDropdownMenuLink" role="button" aria-expanded="false">
                                <span><i class="fa-solid fa-shirt me-3"></i></span>
                                Categorias
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <?php
                                $categoria = new ameri\Categoria;
                                $info_categoria = $categoria->mostrar();
                                $cantidad_categoria = count($info_categoria);

                                if ($cantidad_categoria > 0) {
                                    for ($x = 0; $x < $cantidad_categoria; $x++) {
                                        $item = $info_categoria[$x];
                                ?>
                                        <li><a class="dropdown-item py-md-2" href="<?php print $root_productos . '?id=' . $item['id'] ?>"><?php print $item['nombre'] ?></a></li>

                                <?php
                                    }
                                }
                                ?>
                            </ul>
                        </li>

                        <li class="nav-item dropdown pe-md-4">
                            <a class="nav-link dropdown-toggle  <?php if ($page_name == "kits") {
                                                                    echo "active";
                                                                } ?>" href="<?php print $root_productos_kits; ?>" id="navbarDropdownMenuLink" role="button" aria-expanded="false">
                                <span><i class="fa-solid fa-bag-shopping me-3"></i></span>
                                Kits
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <?php
                                $kits = new ameri\Kits;
                                $info_kits = $kits->mostrar();
                                $cantidad_kits = count($info_kits);

                                if ($cantidad_kits > 0) {
                                    for ($x = 0; $x < $cantidad_kits; $x++) {
                                        $item = $info_kits[$x];
                                ?>
                                        <li><a class="dropdown-item py-md-2" href="<?php print $root_productos_kits; ?>"><?php print $item['nombre'] ?></a></li>

                                <?php
                                    }
                                }
                                ?>
                            </ul>
                        </li>

                        <li class="nav-item dropdown pe-md-4">
                            <a class="nav-link dropdown-toggle  <?php if ($page_name == "eventos") {
                                                                    echo "active";
                                                                } ?>" href="<?php print $root_eventos; ?>" id="navbarDropdownMenuLink" role="button" aria-expanded="false">
                                <span><i class="fa-solid fa-calendar me-3"></i></span>
                                Eventos
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <?php
                                $categoria = new ameri\Evento;
                                $info_evento = $categoria->mostrar();
                                $cantidad_evento = count($info_evento);

                                if ($cantidad_evento > 0) {
                                    for ($x = 0; $x < $cantidad_evento; $x++) {
                                        $item = $info_evento[$x];
                                ?>
                                        <li><a class="dropdown-item py-md-2" href="<?php print $root_productos_eventos . '?id=' . $item['id'] ?>"><?php print $item['nombre'] ?></a></li>

                                <?php
                                    }
                                }
                                ?>
                            </ul>
                        </li>

                        <li class="nav-item pe-md-4">
                            <a class="nav-link <?php if ($page_name == "cotizaciones") {
                                                    echo "active";
                                                } ?>" aria-current="page" href="<?php print $root_cotizaciones; ?>">
                                <span><i class="fa-solid fa-file-invoice me-3"></i></span>
                                Cotizaciones</a>
                        </li>

                    </ul>

                </div>

                <div class="ms-auto d-flex">
                    <div class="nav-item pe-md-4">
                        <a class="p-2 nav-link <?php if ($pagina == "index") {
                                                    echo "active";
                                                } ?>" aria-current="page" href="<?php print $root_index; ?>"><span><i class="fa-solid fa-arrow-left me-2 "></i></span> Regresar a Indoff Pro</a>
                    </div>

                    <div class="nav-item dropdown">
                        <a class="p-2 nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" aria-expanded="false">
                            <span> <i class="fas fa-user text-white align-self-center me-3"></i>
                            </span> <?php print $_SESSION['admin_info']['admin_user']; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item py-2" href="<?php print $root_logout; ?>"><span><i class="me-2 fas fa-sign-out-alt align-self-center"></i></span>Cerrar sesión</a></li>
                        </ul>
                    </div>

                </div>

            </div>
        </nav>

    </header>

    <main id="main-site" class="">