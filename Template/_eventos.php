<?php

require 'vendor/autoload.php';
$eventos= new ameri\Evento;

$info_eventos = $eventos->mostrar();

?>

<!--eventos-->
<section id="eventos">

    <div class="container-fluid">

        <div class="row  eventos-chart color-black-bg">

            <div class="col-6 evento1 align-self-center text-white" style="background-image: url(upload/<?php print $info_eventos[0]['imagen'];?>);">
                <div class="col-4 mx-auto">
                    <h5 class="etiqueta-evento p-lg-2 text-white text-center">Evento destacado</h5>
                </div>
                <div class="col-6 mx-auto text-center">
                    <h1 class="section-subtitle py-lg-3"><?php print $info_eventos[0]['nombre'];?></h1>
                    <p class="section-description"><?php print $info_eventos[0]['descripcion'];?>
                    </p>
                    <a class="btn btn-primary" href="#" role="button">Ver productos</a>
                </div>
            </div>

            <div class="col-6 evento1 align-self-center text-white">
                <div class="col-4 mx-auto">
                    <h5 class="etiqueta-evento color-white-bg  color-black p-lg-2 text-white text-center">Evento destacado</h5>
                </div>
                <div class="col-6 mx-auto text-center">
                    <h1 class="section-subtitle py-lg-3"><?php print $info_eventos[1]['nombre'];?></h1>
                    <p class="section-description"><?php print $info_eventos[1]['descripcion'];?>
                    </p>
                    <a class="btn btn-primary" href="#" role="button">Ver productos</a>
                </div>
            </div>
            
        </div>

    </div>

</section>