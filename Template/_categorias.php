<!--categorias-->
<section id="categorias" class="categorias-section">
    <div class="container">

        <div class="row justify-content-center text-center">
            <h2 class="section-title py-5">Categorias destacadas</h2>
        </div>

        <div class="row justify-content-center text-center pb-5">

            <?php
            require 'vendor/autoload.php';
            $categoria = new ameri\Categoria;
            $info_categoria = $categoria->mostrarOrden();
            $cantidad = count($info_categoria);

            if ($cantidad > 0) {
                for ($x = 0; $x < $cantidad; $x++) {
                    $item = $info_categoria[$x];
            ?>
                    <div class="col-lg-4 col-12 col-md-6 px-5">
                        <a class="card categorias mb-5" href="categorias.php?id=<?php print $item['id'] ?>">
                            <?php
                            $imagen = 'upload/' . $item['imagen'];
                            if (file_exists($imagen)) {
                            ?>

                                <img src="<?php print $imagen; ?>" class="card-img-top thumbnail py-3 " style="object-fit: contain;" alt="...">

                            <?php } else { ?>
                                Sin imagen
                            <?php } ?>

                            <div class="card-body">
                                <h5 class="fw-600 mb-1"><?php print $item['nombre'] ?></h5>
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