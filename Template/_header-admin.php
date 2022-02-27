<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $title; ?></title>

    <!--BOOTSTRAP CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- font awesome icons -->
    <script src="https://kit.fontawesome.com/18bf3390f6.js" crossorigin="anonymous"></script>

    <!--select-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!--CUSTOM CSS FILE-->
    <?php echo $root_styles; ?>
    <!-- <link rel="stylesheet" href="../styles_login.css"> -->

    <?php
    // require functions.php file
    require($root_functions);
    // require('../functions.php');
    ?>

</head>

<body>

    <!--start #header-->
    <header class="header-admin">

        <!--pimary navigation-->
        <nav class="navbar py-md-0 navbar-expand-lg color-aqua-bg fw-600 px-md-1">
            <div class="container-fluid">
                <div class="d-flex">
                    <a class="align-self-center navbar-brand px-md-3 fs-2 fw-500 text-white font-gentium me-auto" <?php echo $root_dashboard; ?>>Indoff Pro Dashboard</a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="fas fa-bars text-white m-0"></i>
                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item px-md-4 uppercase">
                            <a class="nav-link text-white" aria-current="page" href="/tutorial/Indoff Pro Website/index.php">Indoff Pro</a>
                        </li>
                        <li class="nav-item px-md-4 dropdown">
                            <a class="nav-link text-white uppercase dropdown-toggle <?php if ($pagina == "categorias") {
                                                                                        echo "active";
                                                                                    } ?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" <?php echo $root_categorias; ?>>Categorías</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php
                                require $root_vendor;
                                $categoria = new ameri\Categoria;
                                $info_categoria = $categoria->mostrar();
                                $cantidad = count($info_categoria);

                                if ($cantidad > 0) {
                                    for ($x = 0; $x < $cantidad; $x++) {
                                        $item = $info_categoria[$x];
                                ?>
                                        <li><a class="dropdown-item" href="<?php print $root_productos_eventos_header ?>productos/index.php?id=<?php print $item['id'] ?>"><?php print $item['nombre'] ?></a></li>

                                <?php
                                    }
                                }
                                ?>
                            </ul>
                        </li>
                        <li class="nav-item dropdown px-md-4 ">
                            <a class="nav-link text-white text-white dropdown-toggle uppercase <?php if ($pagina == "eventos") {
                                                                                                    echo "active";
                                                                                                } ?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" <?php echo $root_eventos; ?>>Eventos</a>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php
                                require $root_vendor;
                                $evento = new ameri\Evento;
                                $info_evento = $evento->mostrar();
                                $cantidad_evento = count($info_evento);

                                if ($cantidad_evento > 0) {
                                    for ($x = 0; $x < $cantidad_evento; $x++) {
                                        $item = $info_evento[$x];
                                ?>
                                        <li><a class="dropdown-item" href="<?php print $root_productos_eventos_header ?>productos-eventos/index.php?id=<?php print $item['id'] ?>"><?php print $item['nombre'] ?></a></li>

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
                    <div class="d-flex px-md-4 pb-md-2 pt-lg-1 m-0 mr-8">
                        <div class="align-items-center menu text-center d-flex text-white">
                            <div class="col mx-md-4 d-flex align-items-center">
                                <div><i class="fas fa-file-invoice fs-1-5"></i></div>
                                <div><a href="carrito.php" class="text-white px-md-3 admin-nav-menu">Cotizaciones</a></div>
                            </div>
                            <div class="col ms-md-1 d-flex align-items-center">
                                <div><i class="fas fa-user-alt fs-1-5"></i></div>
                                <div class="nav-item dropdown">
                                    <a class="text-white px-md-3 dropdown-toggle admin-nav-menu" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?php print $_SESSION['admin_info']['nombre_login'] ?>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="<?php print $root_cerrar_sesion ?>">Cerrar sesión</a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!--!pimary navigation-->

    </header>
    <!--!start #header-->

    <!--start #main-site-->
    <main id="main-site">