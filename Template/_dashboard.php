<?php

require '../vendor/autoload.php';
$eventos= new ameri\Evento;
$categorias = new ameri\Categoria;

$info_eventos = $eventos->mostrar();
$info_categorias = $categorias->mostrar();

$cantidade = count($info_eventos);
$cantidadca = count($info_categorias);

?>

<section>

    <div class="container text-center">

        <div class="row justify-content-evenly ">

            <h2 class="section-title pt-md-5 text-center">Admin Dashboard</h2>

            <h5 class="fw-500 pt-md-3 pb-md-5">¿Que sección deseas editar?</h5>

            <div class="col-lg-3 col-md-7">
                <a class="card dashboard-card mb-md-5 text-center" href="categorias/index.php">
                    <h3 class="fw-600 p-md-4 pb-md-0 color-purple text-end"><?php print $cantidadca?></h3>
                    <i class="dashboard-card-icon fa-solid fa-shirt pt-md-3 pb-md-5 color-purple"></i>

                    <div class="card-body py-md-4">
                        <h5 class="fw-700">Categorias <i class="fa-solid fa-pen-to-square"></i></h5>
                        <p class="fw-500 m-lg-0">Editar las categorias y los productos activos.</p>
                    </div>

                </a>
            </div>

            <div class="col-lg-3 col-md-7">
                <a class="card dashboard-card mb-md-5 text-center" href="eventos/index.php">
                <h3 class="fw-600 p-md-4 pb-md-0 color-purple text-end"><?php print $cantidade?></h3>
                    <i class="dashboard-card-icon fa-solid fa-gift  pt-md-3 pb-md-5 color-purple"></i>

                    <div class="card-body py-md-4">
                        <h5 class="fw-700">Eventos <i class="fa-solid fa-pen-to-square"></i></h5>
                        <p class="fw-500 m-lg-0">Editar los eventos activos y los productos disponibles.</p>
                    </div>

                </a>
            </div>

            <div class="col-lg-3 col-md-7">
                <a class="card dashboard-card mb-md-5 text-center" href="">
                <h3 class="fw-600 p-md-4 pb-md-0 color-grey text-end">1</h3>
                    <i class="dashboard-card-icon fa-solid fa-envelope-open-text  pt-md-3 pb-md-5 color-purple"></i>
                    <div class="card-body py-md-4">
                        <h5 class="fw-700">Información <i class="fa-solid fa-pen-to-square"></i></h5>
                        <p class="fw-500 m-lg-0">Editar los datos de inicio e información de contacto.</p>
                    </div>

                </a>
            </div>

        </div>

    </div>


</section>