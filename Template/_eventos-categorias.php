<!--categorias-->
<section id="categorias" class="categorias-section">
    <div class="container">
        <div class="row justify-content-center text-center pb-md-5">
            <h2 class="section-title py-md-5">Eventos destacados</h2>

            <?php
            require 'vendor/autoload.php';
            $Evento = new ameri\Evento;
            $info_evento = $Evento->mostrarOrden6();
            $cantidad = count($info_evento);

            if ($cantidad > 0) {
                for ($x = 0; $x < $cantidad; $x++) {
                    $item = $info_evento[$x];
            ?>
                    <div class="col-lg-4 col-md-6 px-md-5">
                        <a class="card  categorias mb-md-5" href="productos-eventos.php?id=<?php print $item['id'] ?>">
                            <?php
                            $imagen = 'upload/' . $item['imagen'];
                            if (file_exists($imagen)) {
                            ?>

                                <img src="<?php print $imagen; ?>" class="card-img-top thumbnail " style="object-fit: cover;" alt="...">

                            <?php } else { ?>
                                Sin imagen
                            <?php } ?>

                            <div class="card-body">
                                <h5 class="fw-600 mb-md-1"><?php print $item['nombre'] ?></h5>
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