<?php

require 'vendor/autoload.php';
$eventos = new ameri\Evento;

$info_eventos = $eventos->mostrar();

?>

<!--eventos-->
<section id="eventos">

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-6 col-12 evento text-white" style=" background: linear-gradient(to bottom, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.1)), url(upload/<?php print $info_eventos[0]['imagen']; ?>);">

                <div class="col-lg-4 col-6 col-md-8 mx-auto pt-5">
                    <h5 class="etiqueta-evento color-orange-bg text-white text-center mt-5 py-2">Evento</h5>
                </div>
                <div class="col-lg-6 col-12 mx-auto pb-5 text-center">
                    <h1 class="section-subtitle pt-4 py-3" style="text-shadow: 0px 3px 5px rgba(0, 0, 0, 0.3);"><?php print $info_eventos[0]['nombre']; ?></h1>
                    <p class="section-description py-3" style="text-shadow: 0px 3px 5px rgba(0, 0, 0, 0.2);"><?php print $info_eventos[0]['descripcion']; ?>
                    </p>
                    <a class="btn btn-primary me-3 mb-5" href="productos-eventos.php?id=<?php print $info_eventos[0]['id'] ?>" role="button">Ver productos</a>
                    <a class="btn btn-third color-white mb-5" href="eventos.php" role="button">Ver eventos</a>
                </div>

            </div>

            <div class="col-md-6 col-12 evento text-white" style=" background: linear-gradient(to bottom, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.1)), url(upload/<?php print $info_eventos[1]['imagen']; ?>);">

                <div class="col-lg-4 col-6 col-md-8 mx-auto pt-5">
                    <h5 class="etiqueta-evento color-white-bg color-black text-white text-center mt-5 py-2">Evento</h5>
                </div>
                <div class="col-lg-6 col-12 mx-auto pb-5 text-center">
                    <h1 class="section-subtitle pt-4 py-3" style="text-shadow: 0px 3px 5px rgba(0, 0, 0, 0.3);"><?php print $info_eventos[1]['nombre']; ?></h1>
                    <p class="section-description py-3" style="text-shadow: 0px 3px 5px rgba(0, 0, 0, 0.2);"><?php print $info_eventos[1]['descripcion']; ?>
                    </p>
                    <a class="btn btn-primary me-3 mb-5" href="productos-eventos.php?id=<?php print $info_eventos[1]['id'] ?>" role="button">Ver productos</a>
                    <a class="btn btn-third color-white mb-5" href="eventos.php" role="button">Ver eventos</a>
                </div>

            </div>
        </div>

    </div>


</section>