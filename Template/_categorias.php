<!--categorias-->
<section id="categorias" class="categorias-section">
    <div class="container-fluid pb-5">

        <div class="row justify-content-center text-center">
            <h2 class="section-title py-5">Categorías destacadas</h2>
        </div>

        <div class="row justify-content-center col-lg-15 col-md-10 mx-auto">
            <?php
            require 'vendor/autoload.php';
            $categoria = new ameri\Categoria;
            $info_categoria = $categoria->mostrarOrden();
            $cantidad = count($info_categoria);

            if ($cantidad > 0) {
                for ($x = 0; $x < $cantidad; $x++) {
                    $item = $info_categoria[$x];
            ?>
                    <div class="col-lg-4 col-md-6 px-5">
                        <a class="card categorias mb-5" href="categorias.php?id=<?php print $item['id'] ?>">
                            <?php
                            $imagen = 'upload/' . $item['imagen'];
                            if (file_exists($imagen)) {
                            ?>

                                <img src="<?php print $imagen; ?>" class="card-img-top thumbnail" style="object-fit: cover;" alt="...">

                            <?php } else { ?>
                                <p>La imagen no se encuentra disponible</p> <?php } ?>

                            <div class="card-body">
                                <h4 class="fw-700 px-4 mb-1"><?php print $item['nombre'] ?></h4>
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