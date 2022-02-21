<?php

require 'vendor/autoload.php';
$eventos = new ameri\Evento;

$info_eventos = $eventos->mostrar();

?>

<!--eventos-->
<section id="eventos">

    <div class="container-fluid">

        <div class="row eventos-chart color-black-bg ">

            <div class="col-6 evento text-white" style="background-image: url(upload/<?php print $info_eventos[0]['imagen']; ?>);">

                <div class="col-4 mx-auto pt-md-5">
                    <h5 class="etiqueta-evento text-white text-center mt-md-5 py-md-2">Evento destacado</h5>
                </div>
                <div class="col-6 mx-auto pb-md-5 text-center">
                    <h1 class="section-subtitle py-lg-3"><?php print $info_eventos[0]['nombre']; ?></h1>
                    <p class="section-description"><?php print $info_eventos[0]['descripcion']; ?>
                    </p>
                    <a class="btn btn-primary mb-md-5" href="#" role="button">Ver productos</a>
                    <a class="btn btn-third color-white mb-md-5" href="#" role="button">Ver más eventos</a>
                </div>

            </div>

            <div class="col-6 evento text-white" style="background-image: url(upload/<?php print $info_eventos[1]['imagen']; ?>);">

                <div class="col-4 mx-auto pt-md-5">
                    <h5 class="etiqueta-evento color-white-bg color-black text-center mt-md-5 py-md-2">Evento destacado</h5>
                </div>
                <div class="col-6 mx-auto pb-md-5 text-center">
                    <h1 class="section-subtitle py-lg-3"><?php print $info_eventos[1]['nombre']; ?></h1>
                    <p class="section-description"><?php print $info_eventos[1]['descripcion']; ?>
                    </p>
                    <a class="btn btn-primary mb-md-5" href="#" role="button">Ver productos</a>
                    <a class="btn btn-third color-white mb-md-5" href="#" role="button">Ver más eventos</a>
                </div>

            </div>



        </div>

    </div>

</section>