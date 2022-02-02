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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <!--select-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <!--CUSTOM CSS FILE-->
    <link rel="stylesheet" href="style1.css">


    <?php
    // require functions.php file
    require('functions.php');
    ?>

</head>

<body>

    <!--start #header-->
    <header id="header">

        <!--pimary navigation-->
        <nav class="navbar py-md-1 navbar-expand-lg color-aqua-bg fw-600 spx-md-1">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                        <i class="fas fa-bars text-white m-0"></i>
                    </span>
                </button>
                <a class="align-self-center navbar-brand px-md-4 px-lg-4 fs-2-5 fw-500 text-white font-gentium p-lg-0 m-lg-0 me-auto" href="index.php">Indoff Pro</a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">

                        <li class="nav-item px-md-4 uppercase <?php if ($pagina == "inicio") {
                                                                    echo "active";
                                                                } ?>">
                            <a class="nav-link text-white active" aria-current="page" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item px-md-4 uppercase <?php if ($pagina == "inicio") {
                                                                    echo "active";
                                                                } ?>">
                            <a class="nav-link text-white active" aria-current="page" href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item px-md-4 dropdown">
                            <a class="nav-link text-white uppercase dropdown-toggle <?php if ($pagina == "categorias") {
                                                                                        echo "active";
                                                                                    } ?>" href="categorias.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Categorias
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Categoria 1</a></li>
                                <li><a class="dropdown-item" href="#">Categoria 2</a></li>
                                <!--<li><hr class="dropdown-divider"></li>-->
                                <li><a class="dropdown-item" href="#">Categoria 3</a></li>
                                <li><a class="dropdown-item" href="#">Categoria 4</a></li>
                                <li><a class="dropdown-item" href="#">Categoria 5</a></li>
                                <li><a class="dropdown-item" href="#">Categoria 6</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown px-md-4 ">
                            <a class="nav-link text-white text-white dropdown-toggle uppercase" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Eventos
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Evento 1</a></li>
                                <li><a class="dropdown-item" href="#">Evento 2</a></li>
                                <!--<li><hr class="dropdown-divider"></li>-->
                                <li><a class="dropdown-item" href="#">Evento 3</a></li>
                                <li><a class="dropdown-item" href="#">Evento 4</a></li>
                                <li><a class="dropdown-item" href="#">Evento 5</a></li>
                                <li><a class="dropdown-item" href="#">Evento 6</a></li>
                            </ul>
                        </li>
                        <li class="nav-item px-md-4 uppercase">
                            <a class="nav-link text-white" aria-current="page" href="#">Contacto</a>
                        </li>
                        <li class="nav-item px-md-4 uppercase">
                            <a class="nav-link text-white" aria-current="page" href="#">Nosotros</a>
                        </li>


                    </ul>
                    <div class="d-flex ms-auto px-md-4 pb-md-2
                    pt-lg-1 m-0">
                        <div class="align-items-center menu text-center d-flex text-white">
                            <div class="col mx-lg-4 d-flex align-items-center btn-carrito">
                                <div><i class="fas fa-file-invoice fs-1-5"></i></div>
                                <div><a href="carrito.php" class="nav-link text-white px-lg-3 fw-500">Cotizaciones</a></div>
                            </div>
                            <div class="col mx-lg-2 d-flex align-items-center btn-menu">
                                <div><i class="fas fa-user-alt fs-1-5"></i></div>
                                <div>
                                    <a class="nav-link text-white px-lg-3 fw-500" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                        Login
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Cerrar sesión</a></li>
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