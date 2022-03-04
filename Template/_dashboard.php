<?php

require '../vendor/autoload.php';
$eventos = new ameri\Evento;
$categorias = new ameri\Categoria;
$cotizaciones = new ameri\Cotcat;

$info_eventos = $eventos->mostrar();
$info_categorias = $categorias->mostrar();
$info_cotizaciones = $cotizaciones->mostrar();

$cantidade = count($info_eventos);
$cantidadca = count($info_categorias);
$cantidadco = count($info_cotizaciones);



?>

<section>

    <div class="container text-center">

        <div class="row">
            <h1 class="section-title pt-5 text-center">Admin Dashboard</h1>
            <h6 class="pt-3 pb-4 fw-400">¿Que sección deseas editar?</h6>
        </div>

        <div class="row justify-content-evenly py-3">
            <div class="col-lg-3 col-md-6 col-10">
                <a class="card dashboard-card mb-5 text-center" href="categorias/index.php">
                    <div class="card-img-top">
                        <h3 class="fw-600 p-4 pb-0 color-purple text-end"><?php print $cantidadca ?></h3>
                        <i class="dashboard-card-icon fa-solid fa-shirt pt-3 pb-5 color-purple"></i>
                    </div>
                    <div class="card-body py-md-4">
                        <h5 class="fw-600">Categorias <i class="fa-solid fa-pen-to-square"></i></h5>
                        <p class="fw-400 m-0">Editar las categorias y los productos activos.</p>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-6 col-10">
                <a class="card dashboard-card mb-5 text-center" href="eventos/index.php">
                    <div class="card-img-top">
                        <h3 class="fw-600 p-4 pb-0 color-purple text-end"><?php print $cantidade ?></h3>
                        <i class="dashboard-card-icon fa-solid fa-gift pt-3 pb-5 color-purple"></i>
                    </div>
                    <div class="card-body py-4">
                        <h5 class="fw-600">Eventos <i class="fa-solid fa-pen-to-square"></i></h5>
                        <p class="fw-400 m-0">Editar los eventos activos y los productos disponibles.</p>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-6 col-10">
                <a class="card dashboard-card mb-5 text-center" href="pedidos/index.php">
                    <div class="card-img-top">
                        <h3 class="fw-600 p-4 pb-0 color-purple text-end"><?php print $cantidadco ?></h3>
                        <i class="dashboard-card-icon fas fa-file-invoice pt-3 pb-5 color-purple"></i>
                    </div>
                    <div class="card-body py-4">
                        <h5 class="fw-600">Cotizaciones <i class="fa-solid fa-pen-to-square"></i></h5>
                        <p class="fw-400 m-0">Revisar las cotizaciones solicitadas y editar.</p>
                    </div>
                </a>
            </div>

        </div>

    </div>


</section>