<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title><?php echo $title;?></title>

        <!--BOOTSTRAP CDN-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- Owl-carousel CDN -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
            integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
            integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

        <!-- font awesome icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
            integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

        <!--CUSTOM CSS FILE-->
        <?php echo $root_styles;?>
        <!-- <link rel="stylesheet" href="../styles_login.css"> --> 
        
        <?php
        // require functions.php file
             require($root_functions);
           // require('../functions.php');
        ?>

    </head>

    <body>

    <!--start #header-->
    <header id="header">
        <div class="d-flex justify-content-between px-5 pt-3 color-aqua-bg">
            <a class="navbar-brand logo text-white" <?php echo $root_dashboard;?>>Indoff Pro</a>
        </div>
        <nav class="px-5 navbar color-aqua-bg navbar-expand-lg  navbar-dark">
            
            <button class="navbar-toggler mb-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto mx-4">
                    <li class="nav-item"> 
                        <a class="nav-link <?php if ($pagina == "inicio") {echo "active";}?>" <?php echo $root_dashboard;?>>Inicio</a>
                    </li>
                    <li class="nav-item dropdown mx-4">
                        <a class="nav-link dropdown-toggle <?php if ($pagina == "categorias") {echo "active";}?>" <?php echo $root_categorias;?> id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categorías
                        </a>    
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-center <?php if ($pagina == "categorias") {echo "active";}?>" <?php echo $root_categorias;?>>Categorías</a>
                        <a class="dropdown-item text-center <?php if ($pagina == "productos") {echo "active";}?>" <?php echo $root_productos;?>>Productos</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown mx-4">
                        <a class="nav-link dropdown-toggle <?php if ($pagina == "eventos") {echo "active";}?>" <?php echo $root_eventos;?> id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Eventos
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-center <?php if ($pagina == "eventos") {echo "active";}?>" <?php echo $root_eventos;?>>Eventos</a>
                        <a class="dropdown-item text-center <?php if ($pagina == "eventos-productos") {echo "active";}?>" <?php echo $root_eventos_productos;?>>Productos</a>
                        </div>
                    </li>
                    <li class="nav-item mx-4"> 
                        <a class="nav-link <?php if ($pagina == "pedidos") {echo "active";}?>" <?php echo $root_pedidos;?>>Pedidos</a>
                    </li>
                    <li class="nav-item mx-4"> 
                        <a class="nav-link <?php if ($pagina == "pedidos") {echo "active";}?>" href="">Contacto</a>
                    </li>
                    <li class="nav-item mx-4"> 
                        <a class="nav-link <?php if ($pagina == "pedidos") {echo "active";}?>" href="">Nosotros</a>
                    </li>
                </ul>
                <ul class="navbar-nav" style="margin-right: 5%">
                    <i class="fas fa-user-cog pt-1" style="color: white; margin-top: 8%"></i>
                    <li class="nav-item dropdown" style="padding-left:5%"> 
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Admin
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-center" <?php echo $root_logout;?>>Cerrar Sesión</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>