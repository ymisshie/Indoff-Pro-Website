<!--categorias-->
<section id="categorias" class="eventos-section">
    <div class="container">

        <div class="row justify-content-center text-center categorias-fichas">
            <h2 class="section-title py-md-5">Eventos destacados</h2>

            <?php
            require 'vendor/autoload.php';
            $evento = new ameri\Evento;
            $info_evento = $evento->mostrar();
            $cantidad = count($info_evento);

            if ($cantidad > 0) {
                for ($x = 0; $x < $cantidad; $x++) {
                    $item = $info_evento[$x];
            ?>
                    <div class="col-lg-3 col-md-6 px-md-3 mx-lg-4">
                        <a class="card eventos mb-md-5" href="productos-eventos.php?id=<?php print $item['id'] ?>">


                            <?php
                            $imagen = 'upload/' . $item['imagen'];
                            if (file_exists($imagen)) {
                            ?>

                                <img src="<?php print $imagen; ?>" class="card-img-top" alt="...">

                            <?php } else { ?>
                                Sin imagen
                            <?php } ?>

                            <div class="card-body">
                                <h4 class="fw-700 py-md-1"><?php print $item['nombre'] ?></h4>
                                <p class="fw-500 m-md-0"><?php print $item['descripcion'] ?></p>
                                <!--<p class="fw-500 py-md-2 m-lg-0"><i class="far fa-calendar"></i> Fecha del Evento</p>-->
                            </div>
                        </a>
                    </div>
                <?php }
            } else { ?>
                <h4>NO HAY REGISTROS</h4>

            <?php } ?>

        </div>

    </div>

</section>
<!--!categorias-->